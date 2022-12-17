<?php
class students {
    public function __construct(){
        $this->conn = (new db())->connect();
    }
    public function read(){
        $sql = "SELECT * FROM students";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $num  = $stmt->rowCount();
        if($num > 0){
            $data_array = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $data_item = array(
                    'id'                => $id,
                    'name_student'      => $name_student,
                    'username_student'  => $username_student,
                    'email_student'     => $email_student,
                    'phone_student'     => $phone_student,
                    'password_student'  => $password_student,
                    'image_student'     => $image_student,
                    'role'              => $role,
                    'created_at'        => $created_at,
                    'updated_at'        => $updated_at,
                    'status_student'    => $status_student,
                );
                array_push($data_array,$data_item);
            }
            return html_entity_decode( json_encode($data_array, JSON_UNESCAPED_UNICODE) );
        }
    }
    public function detail(){
        if(isset($_GET['id'])){
            if(!empty($_GET['id'])){
                $this->id   = $_GET['id'];
                $this->new_pass = $_GET['new_pass'];
                $this->old_pass = $_GET['old_pass'];
                $check = $this->check_id();
                if(isset($check)){
                    return html_entity_decode( json_encode(array('message' => $check)));
                }
                else {
                    $sql = "SELECT * FROM students WHERE id = ? LIMIT 1";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1,$this->id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $checkPassword = password_verify($this->old_pass,$row['password_student']);
                    if($checkPassword > 0){
                        $password_student_hash = password_hash($this->new_pass,PASSWORD_DEFAULT);
                        $query = "UPDATE students SET password_student = '$password_student_hash' WHERE id= $this->id";
                        $stmt = $this->conn->prepare($query);
                        $stmt->execute();
                        $data_item = array (
                            'message'           => 'Cập nhật thành công !',
                            'id'                => $row['id'],
                            'new_password'      => $this->new_pass
                        );
                        return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
                    }
                    else {
                        $data_item = array (
                            'message'           => 'Mật khẩu cũ không đúng . Vui lòng thử lại !',
                            'id'                => $row['id'],
                            'old_password'      => $this->old_pass
                        );
                        return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
                    }
                }
            }
            else {
                return json_encode(array('message' => 'No data !'));
            }
        }
    }
    public function detail2(){
        if(isset($_GET['id'])){
            if(!empty($_GET['id'])){
                $this->id = $_GET['id'];
                $this->pass = $_GET['pass'];
                $check = $this->check_id();
                if(isset($check)){
                    return html_entity_decode( json_encode(array('message' => $check)));
                }
                else {
                    $sql = "SELECT * FROM students WHERE id = ? LIMIT 1";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->bindParam(1,$this->id);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $data_item = array(
                        'id'                => $row['id'],
                        'name_student'      => $row['name_student'],
                        'username_student'  => $row['username_student'],
                        'email_student'     => $row['email_student'],
                        'phone_student'     => $row['phone_student'],
                        'password_student'  => $row['password_student'],
                        'image_student'     => $row['image_student'],
                        'role'              => $row['role'],
                        'created_at'        => $row['created_at'],
                        'updated_at'        => $row['updated_at'],
                        'status_student'    => $row['status_student'],
                        'pass_post'         => $this->pass
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
        $sql = "SELECT * FROM students WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!isset($row['id'])) {
            return "Học viên không tồn tại !";
        }
    }
}
?>