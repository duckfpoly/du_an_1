<?php
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    if(isset($_POST['btn_update'])){
        $id = $_SESSION['user']['id'];
        echo 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd';
        $name_user = $_POST['name_student'];
        $avatar = isset($_POST['image_student']) ? $_POST['image_student'] : '';
        update_user($name_user,$avatar,$id);
    }
    include 'views/site/profile/profile.php';

?>