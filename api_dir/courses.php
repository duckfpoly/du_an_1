<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods.Authorization,X-Requested-With');
class courses {
    public function __construct(){
        $this->conn = (new db())->connect();
    }
    public function read(){
        header('Access-Control-Allow-Methods: GET');
        $sql = "SELECT * FROM courses";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num  = $stmt->rowCount();
        if($num > 0){
            $data_array = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $data_item = array(
                    'id'                    => $id,
                    'name_course'           => $name_course,
                    'price_course'          => $price_course,
                    'image_course'          => $image_course,
                    'status_course'         => $status_course,
                    'description_course'    => $description_course,
                    'quote'                 => $quote,
                    'discount'              => $discount,
                    'created_at'            => $created_at,
                    'updated_at'            => $updated_at,
                    'id_category '          => $id_category
                );
                array_push($data_array,$data_item);
            }
            return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
        }
    }

    public function show(){
        header('Access-Control-Allow-Methods: GET');
        $result     = json_decode(file_get_contents("php://input"));
        $this->id   = $result->id;
        $check      = $this->check_id();
        if(isset($check)){
            return json_encode(array('message' => $check));
        }
        else {
            $sql = "SELECT * FROM courses WHERE id = ? LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1,$this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $data_item = array(
                'id'            => $row['id'],
                'name_course'   => $row['name_course']
            );
            return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
        }
    }

    public function create(){
        $query = "INSERT INTO categories SET name_category=:name";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->name = htmlspecialchars(strip_tags($this->name));
        // bind data
        $stmt->bindParam(':name', $this->name);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    public function update(){
        $query = "UPDATE categories SET name_category=:name WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        // bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    public function delete(){
        $query = "DELETE FROM categories WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        // clean data
        $this->id = htmlspecialchars(strip_tags($this->id));
        // bind data
        $stmt->bindParam(':id', $this->id);
        if($stmt->execute()) {
            return true;
        }
        printf("Error %s.\n", $stmt->error);
        return false;
    }

    public function search(){
        if(isset($_GET['q'])){
            if(!empty($_GET['q'])){
                $key = $_GET['q'];
                $sql = "SELECT * FROM courses  WHERE name_course LIKE '%$key%'";
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
                            'name_course'           => $name_course,
                            'price_course'          => $price_course,
                            'image_course'          => $image_course,
                            'status_course'         => $status_course,
                            'description_course'    => $description_course,
                            'quote'                 => $quote,
                            'discount'              => $discount,
                            'created_at'            => $created_at,
                            'updated_at'            => $updated_at,
                            'id_category '          => $id_category
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

    public function check_id(){
        $sql = "SELECT * FROM courses WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!isset($row['id'])) {
            return "Khóa học không tồn tại !";
        }
    }
}
?>