<?php 
    $err = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $check = check_user($email,$pass);
        if(is_array($check)){
            setSession('user',$check);
          
            // location($host);
        }else{
            $err = 'Tài khoản hoặc mật khẩu không đúng';
        }
    }
    include "views/account/sign_in.php";
?>