<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
    class notifications {
        public function __construct(){
            $this->conn = (new db())->connect();
        }
        public function read(){
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
        public function create(){
            header('Access-Control-Allow-Methods: POST');
            $result = json_decode(file_get_contents("php://input"));
            return json_encode(array('message' => $result));

            $this->title    = $result->title;
            $this->body     = $result->body;
            $this->time     = $result->time;
//            $query = "INSERT INTO notification_admin SET title = :title ,body = :body, time = :time";
            $stmt = $this->conn->prepare($query);
//            $this->title = htmlspecialchars(strip_tags($this->title));
            $stmt->bindParam(':title', $this->title);
//            $this->body = htmlspecialchars(strip_tags($this->body));
            $stmt->bindParam(':body', $this->body);
//            $this->time = htmlspecialchars(strip_tags($this->time));
            $stmt->bindParam(':time', $this->time);
            if($stmt->execute()) {
                return json_encode(array('message' => 'Created successfully'));
            }
            printf("Error %s.\n", $stmt->error);
            return json_encode(array('message' => "Don't create !"));
        }
        public function update(){
            header('Access-Control-Allow-Methods: PUT');
            $result = json_decode(file_get_contents("php://input"));
            $this->id 	= $result->id;
            $this->name_category = $result->name_category;
            $query = "UPDATE categories SET name_category=:name_category WHERE id=:id";
            $stmt = $this->conn->prepare($query);
            // clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name_category = htmlspecialchars(strip_tags($this->name_category));
            // bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name_category', $this->name_category);
            if($stmt->execute()) {
                return json_encode(array('message' => 'Updated successfully !'));
            }
            printf("Error %s.\n", $stmt->error);
            return json_encode(array('message' => 'Updated False !'));

        }
    }
?>