<?php 
    if(isset($_POST['btn_submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $check = checkUser($email,$pass);

        if(is_array($check)){
            location($host."sign_in");
        }else{
            $err = 'Tài khoản hoặc mật khẩu không đúng';
            return $err;
        }
    }
?>