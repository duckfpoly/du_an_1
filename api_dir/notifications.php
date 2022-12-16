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
            $num  = $stmt->rowCount();
            if($num > 0){
                $output = '';
                while($items = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $time = $this->format_date->diffForHuman($items['time']);
                    $output .= '
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="#">
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
                                    <div class="d-flex justify-content-end align-items-center" style="font-size: 5px; margin-left: 20px">
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
                $count = array_values($row)[0];
                $data = array (
                    'notification'          => $output,
                    'unseen_notification'   => $count
                );
                return html_entity_decode( json_encode($data, JSON_UNESCAPED_UNICODE) );
            }else {
                $data = array (
                    'notification'          => 'Chưa có thông báo mới !',
                    'unseen_notification'   => 0
                );
                return html_entity_decode( json_encode($data, JSON_UNESCAPED_UNICODE) );
            }
        }
        public function update(){
            $query = "UPDATE notification_admin SET status = 1";
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()) {
                return json_encode(array('success' => 'Updated successfully !'));
            }
            printf("Error %s.\n", $stmt->error);
            return json_encode(array('error' => 'Updated False !'));
        }
    }
?>