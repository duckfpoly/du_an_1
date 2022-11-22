<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $date = $_POST['date_time'];
        $check = checkEmail($email);

        if(is_array($check)){
            $err ='Tài khoản đã tồn tại';
        }else{
            addUser($name,$email,$pass,$date);
            location($host.'account/sign_in');
        }
    }
    include "views/account/sign_up.php";

?>