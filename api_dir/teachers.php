<?php
class teachers {
    public function __construct(){
        $this->conn = (new db())->connect();
    }
    public function read(){
        $sql = "SELECT * FROM teachers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num  = $stmt->rowCount();
        if($num > 0){
            $data_array = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $data_item = array(
                    'id'                => $id,
                    'name_teacher'      => $name_teacher,
                    'email_teacher'     => $email_teacher,
                    'phone_teacher'     => $phone_teacher,
                    'password_teacher'  => $password_teacher,
                    'image_teacher'     => $image_teacher,
                    'about_teacher'     => $about_teacher,
                    'scope_teacher'     => $scope_teacher,
                    'role'              => $role,
                    'created_at'        => $created_at,
                    'updated_at'        => $updated_at,
                    'status_teacher'   => $status_teacher
                );
                array_push($data_array,$data_item);
            }
            return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
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
                    $sql = "SELECT * FROM teachers WHERE id = ? LIMIT 1";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1,$this->id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data_item = array(
                        'id'                => $row['id'],
                        'name_teacher'      => $row['name_teacher'],
                        'email_teacher'     => $row['email_teacher'],
                        'phone_teacher'     => $row['phone_teacher'],
                        'password_teacher'  => $row['password_teacher'],
                        'image_teacher'     => $row['image_teacher'],
                        'about_teacher'     => $row['about_teacher'],
                        'scope_teacher'     => $row['scope_teacher'],
                        'role'              => $row['role'],
                        'created_at'        => $row['created_at'],
                        'updated_at'        => $row['updated_at'],
                        'status_teacher'    => $row['status_teacher']
                    );
                    return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
                }
            }
            else {
                return json_encode(array('message' => 'No data !'));
            }
        }
    }
    public function check_id(){
        $sql = "SELECT * FROM teachers WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!isset($row['id'])) {
            return "Giảng viên không tồn tại !";
        }
    }




}
?>