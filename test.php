<?php
    // Hóa đơn của tôi
    function student_order($id_student){
        $sql = "SELECT * FROM tbl_orders WHERE id_students = ?";
        return query_sql($sql,$id_student);
    }
    // Lớp của tôi
    function my_class($id_student){
        $sql = "SELECT * FROM tbl_orders WHERE id_students = ? AND status = 2";
        $order = query($sql,$id_student);
        foreach ($order as $items){
            if($items['status'] == 2){
                $sql = "SELECT * FROM classes 
                    INNER JOIN detail_classes ON classes.id = detail_classes.id_class
                    WHERE classes.status_class = 0 AND detail_classes.id_students = ?";
                return query($sql,$id_student);
            }
        }
    }
    // đăng nhập học viên
    function login_students($data,$password){
        if(empty($data) || empty($password)){
            $alert = "Vui lòng nhập đầy đủ thông tin !";
            return $alert;
        }
        else {
            $query = "SELECT * FROM students WHERE username_student = '$data' OR email_student = '$data'";
            $value = query_one($query);
            if(isset($value['username_student']) || isset($value['email_student'])){
                if($value['status_student'] == 1 ){
                    $alert = "Tài khoản của bạn đã bị vô hiệu hóa !";
                    return $alert;
                }
                else {
                    $checkPass = password_verify($password, $value['password_student']);
                    if ($checkPass > 0) {
                        setSession('user',$value);
                    }
                    else {
                        $alert = "Sai mật khẩu !";
                        return $alert;
                    }
                }
            }
            else {
                $alert = "Tài khoản không tồn tại !";
                return $alert;
            }
        }
    }
?>