<?php
    class notifications {
        public function __construct(){
            $this->conn = (new db())->connect();
            $this->format_date = new fomat_datetime();
        }
        public function read2(){
            $sql = "SELECT * FROM notification_admin WHERE status = 0 ORDER BY id DESC LIMIT 5 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $num  = $stmt->rowCount();
            if($num > 0){
                $data_array = [];
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $data_item = array(
                        'id'        => $id,
                        'title'     => $title,
                        'body'      => $body,
                        'time'      => $time,
                        'status'    => $status,
                    );
                    array_push($data_array,$data_item);
                }
                return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
            }
        }
        public function read(){
            $sql = "SELECT * FROM notification_admin WHERE status = 0 ORDER BY id DESC LIMIT 5 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $unseen_noti  = $stmt->rowCount();
            $unseen = '';
            $count_unseen = '';
            if($unseen_noti > 0){
                while($items = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $time = $this->format_date->diffForHuman($items['time']);
                    $unseen .= '
                        <li class="mb-2" onclick="updateStatusNotification('.$items['id'].')">
                            <a class="dropdown-item border-radius-md" href="'.$items['url'].'">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">'.$items['body'].'</span>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            '.$time.'
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center" id="red_dot" style="font-size: 5px; margin-left: 20px">
                                        <div>🔴</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    ';
                }
                $sql = "SELECT COUNT(*) FROM notification_admin WHERE status = 0";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $count_unseen = array_values($row)[0];
            }
            $sql = "SELECT * FROM notification_admin WHERE status = 1 ORDER BY id DESC LIMIT 5 ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $seen_noti = $stmt->rowCount();
            $seen = '';
            if ($seen_noti > 0) {
                while ($items = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $time = $this->format_date->diffForHuman($items['time']);
                    $seen .= '
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="'.$items['url'].'">
                                <div class="d-flex py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">' . $items['body'] . '</span>
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            ' . $time . '
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    ';
                }
            }
            $data = array(
                'unseen_notification'       => $unseen,
                'seen_notification'         => $seen,
                'count_unseen_notification' => $count_unseen,
                'count_seen_notification'   => 0,
            );
            return html_entity_decode(json_encode($data, JSON_UNESCAPED_UNICODE));
        }
        public function update2(){
            $query = "UPDATE notification_admin SET status = 1";
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()) {
                return json_encode(array('success' => 'Updated successfully !'));
            }
            printf("Error %s.\n", $stmt->error);
            return json_encode(array('error' => 'Updated False !'));
        }
        public function update(){
            $result = json_decode(file_get_contents("php://input"));
            $this->id 	= $result->id;
            $query = "UPDATE notification_admin SET status = 1 WHERE id=:id";
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':id', $this->id);
            if($stmt->execute()) {
                return json_encode(array('message' => 'Updated successfully !'));
            }
            printf("Error %s.\n", $stmt->error);
            return json_encode(array('message' => 'Updated False !'));
        }
    }
?>