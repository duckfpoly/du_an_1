<?php 
    $err = '';
//    if($_SERVER['REQUEST_METHOD'] === 'POST'){
//        $email = $_POST['email'];
//        $pass = $_POST['password'];
//        $role = $_POST['role'];
//        if($role == 'students' ){
//            $check = check_user($email,$pass);
//            if(is_array($check)){
//                setSession('user',$check);
//                location($host);
//            }else{
//                $err = 'Tài khoản hoặc mật khẩu không đúng';
//            }
//        }
//        else{
//            $check = check_teacher($email,$pass);
//            if(is_array($check)){
//                setSession('user',$check);
//                location($host);
//            }
//            else{
//                $err = 'Tài khoản hoặc mật khẩu không đúng';
//            }
//        }
//    }
    $client->setRedirectUri("http://localhost/courses/account/sign_in");
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);
        $google_account_info = $this->google_oauth->userinfo->get();
        $email =  $google_account_info->email;
        $login_client = login_client_gg($email);
    }
    if(isset($login_client)){
        alert($email,BASE_URL);
    }

    include "views/account/sign_in.php";
?>