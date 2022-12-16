<?php
    function check_user($username,$pass){
        $sql = "SELECT * FROM students WHERE (email_student = '$username' || username_student = '$username') AND password_student = '$pass'";
        return query_one($sql);
    }

    function check_teacher($email, $pass){
        $sql = "SELECT * FROM teachers WHERE email_teacher = '$email' AND password_teacher = '$pass'";
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
                setSession('user',$value);
                location(BASE_URL);
            }
        }
        else {
            return "Email chưa được đăng ký !";
        }
    }

    function login_teacher_gg($email){
        $query = "SELECT * FROM teachers WHERE email_teacher = '$email'";
        $value = query_one($query);
        if(isset($value['email_teacher'])){
            if($value['status_teacher'] == 1) {
                return "Tài khoản của bạn đã bị cấm !";
            }
            else {
                setSession('user',$value);
                location(DASHBOARD_TEACHER);
            }
        }
        else {
            return "Email chưa được đăng ký !";
        }
    }


?>