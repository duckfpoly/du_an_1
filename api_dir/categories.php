<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
class categories{
        public function __construct(){
            $this->conn = (new db())->connect();
        }
        public function read(){
            $sql = "SELECT * FROM categories";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $num  = $stmt->rowCount();
            if($num > 0){
                $data_array = [];
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    $data_item = array(
                        'id'    => $id,
                        'name'  => $name_category
                    );
                    array_push($data_array,$data_item);
                }
                return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
            }
        }
        public function show(){
            $result     = json_decode(file_get_contents("php://input"));
            $this->id   = $result->id;
            $check      = $this->check_id();
            if(isset($check)){
                return html_entity_decode( json_encode(array('message' => $check)));
            }
            else {
                $sql = "SELECT * FROM categories WHERE id = ? LIMIT 1";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(1,$this->id);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $data_item = array(
                    'id'    => $row['id'],
                    'name'  => $row['name_category']
                );
                return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
            }
        }
        public function create(){
            header('Access-Control-Allow-Methods: POST');
            $result = json_decode(file_get_contents("php://input"));
            $this->name = $result->name_category;
            $query = "INSERT INTO categories SET name_category=:name";
            $stmt = $this->conn->prepare($query);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $stmt->bindParam(':name', $this->name);
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
        public function delete(){
            header('Access-Control-Allow-Methods: DELETE');
            $result = json_decode(file_get_contents("php://input"));
            $this->id = $result->id;
            $check = $this->check_id();
            if(isset($check)){
                return html_entity_decode( json_encode(array('message' => $check)));
            }
            else {
                $query = "DELETE FROM categories WHERE id=:id";
                $stmt = $this->conn->prepare($query);
                $this->id = htmlspecialchars(strip_tags($this->id));
                $stmt->bindParam(':id', $this->id);
                if($stmt->execute()) {
                    return json_encode(array('message' => 'Deleted successfully'));
                }
                printf("Error %s.\n", $stmt->error);
                return json_encode(array('message' => 'Deleted false !'));
            }
        }
        public function check_id(){
            $sql = "SELECT * FROM categories WHERE id = ? LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!isset($row['id'])) {
                return "Danh mục không tồn tại !";
            }
        }
        public function search(){
            if(isset($_GET['q'])){
                if(!empty($_GET['q'])){
                    $key = $_GET['q'];
                    $sql = "SELECT * FROM categories  WHERE name_category LIKE '%$key%'";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    $read = $stmt;
                    $num  = $read->rowCount();
                    if($num > 0){
                        $data_array = [];
                        while($row = $read->fetch(PDO::FETCH_ASSOC)){
                            extract($row);
                            $data_item = array(
                                'id'                    => $id,
                                'name_category'         => $name_category,
                            );
                            array_push($data_array,$data_item);
                        }
                        return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
                    }
                    else {
                        return json_encode(array('message' => 'No data !'));
                    }
                }
                else {
                    return json_encode(array('message' => 'No data !'));
                }
            }
        }
        public function detail(){
            if(isset($_GET['id'])){
                if(!empty($_GET['id'])){
                    $this->id = $_GET['id'];
                    $check = $this->check_id();
                    if(isset($check)){
                        return html_entity_decode( json_encode(array('message' => $check)));
                    }
                    else {
                        $sql = "SELECT * FROM categories WHERE id = ? LIMIT 1";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1,$this->id);
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $data_item = array(
                            'id'    => $row['id'],
                            'name'  => $row['name_category']
                        );
                        return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
                    }
                }
                else {
                    return json_encode(array('message' => 'No data !'));
                }
            }
        }
}
?>