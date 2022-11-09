<?php
    include 'global.php';
    checkLogin();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = login_admin($username,$password);
    }
    include_once 'views/admin/login.php';
?>