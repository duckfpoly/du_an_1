<?php
    $client->setRedirectUri(TEACHER_SIGNIN);
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        !isset($token['access_token']) && location(TEACHER_SIGNIN);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $login_client = login_teacher_gg($email);
    }
    include "views/account/teacher_signin.php";
?>