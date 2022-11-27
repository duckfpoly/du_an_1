<?php
    checkLogin();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = login_admin($username,$password);
    }
    $client->setRedirectUri(BASE_URL.'login');
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $ad_login = login_admin_gg($email);
    }
    include_once 'views/admin/login.php';