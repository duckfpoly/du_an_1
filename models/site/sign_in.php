<?php
    function check_user($email,$pass){
        $sql = "SELECT * FROM students WHERE email_student = '$email' AND password_student = '$pass'";
        return query_one($sql);
    }

    function login_client_gg($email){
        $query = "SELECT * FROM students WHERE email_student = '$email'";
        $value = query_one($query);
        if(isset($value['email_student'])){
            if($value['status_student'] == 1) {
                return "Tài khoản của bạn đã bị vô hiệu hóa !";
            }
            else {
                return $value;
//                setSession('user',$value);
            }
        }
        else {
            return "Email chưa được đăng ký !";
        }
    }

?>