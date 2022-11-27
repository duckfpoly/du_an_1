<?php
    checkLogin();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = login_admin($username,$password);
    }
<<<<<<< HEAD
    $client->setRedirectUri(BASE_URL.'login');
=======
    $client->setRedirectUri(BASE_URL."login");
>>>>>>> ebc1d661083790baa4a3ed55a6bcfa0db6da6670
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $ad_login = login_admin_gg($email);
    }
    include_once 'views/admin/login.php';