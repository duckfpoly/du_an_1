<?php
    $client->setRedirectUri("http://localhost/courses/account/teacher_signin");
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $login_client = login_teacher_gg($email);
    }
    include "views/account/teacher_signin.php";
?>