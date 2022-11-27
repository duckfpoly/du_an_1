<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $date = $_POST['date_time'];
        $check = checkEmail($email);
        if(is_array($check)){
            $err ='Tài khoản đã tồn tại';
        }
        else{
            addUser($name,$email,$pass,$date);
            location(BASE_URL.'account/sign_in');
        }
    }
    $client->setRedirectUri(BASE_URL."account/sign_up");
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email      =  $google_account_info->email;
        $name_user  =  $google_account_info->name;
        $password   =  rand(0,99999999);
        $created_at = date("Y-m-d H:i:s");

        $create     =  sign_up_gg($name_user,$email,$password,$created_at);
    }
    include "views/account/sign_up.php";
?>