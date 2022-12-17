<?php 
    $err = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email;
        $pass;
        $captcha;
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['password'])){
            $pass = $_POST['password'];
        }
        if(isset($_POST['g-recaptcha-response'])){
            $captcha = $_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            $err = 'Chưa xác nhận captcha !';
        }else{
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lcj8zYjAAAAAGHQeGZaLMxrtZD_sGX6zj0e3cUK&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
            $data = json_decode($response);
            if($data->success == false){
                $err = 'Spam';
            }else{
                $err = check_user($email, $pass);
                if(!$err){
                    location(HOME);
                }
            }
        }
    }
    $client->setRedirectUri(SIGIN);
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        !isset($token['access_token']) && location(SIGIN);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $login_client = login_client_gg($email);
    }
    include "views/account/sign_in.php";
?>