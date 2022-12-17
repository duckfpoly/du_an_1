<?php
    function check_user($username,$pass){
        $sql = "SELECT * FROM students WHERE email_student = '$username' OR username_student = '$username'";
        $data = query_one($sql);
        if(isset($data['username_student']) || isset($data['email_student'])){
            if($data['status_student'] == 1){
                $err = 'Tài khoản đã bị khóa';
                return $err;
            }else{
                $check_pass = password_verify($pass, $data['password_student']);
                if($check_pass > 0){
                    setSession('user',$data);
                }else{
                    $err = 'Sai mật khẩu!';
                    return $err;
                }
            }
        }else{
            $err = 'Tài khoản không tồn tại';
            return $err;
        }
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