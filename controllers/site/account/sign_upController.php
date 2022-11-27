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
            location($host.'account/sign_in');
        }
    }
    $client->setRedirectUri(BASE_URL."account/sign_up");
    if (isset($_GET['code'])) {
        $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
        $this->client->setAccessToken($token['access_token']);
        $google_account_info = $this->google_oauth->userinfo->get();
        $email      =  $google_account_info->email;
        $name_user  =  $google_account_info->name;
        $username   =  cut_email($email);
        $password   =  rand(0,9999990);
        $create     =  sign_up_gg($username,$name_user,$email,$password);
    }
    include "views/account/sign_up.php";
?>