<?php
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    if(isset($_POST['btn_update'])){
        $id = $_SESSION['user']['id'];
        $name_user = $_POST['name_student'];
        $avatar = $_POST['image_student'];
        $phone = $_POST['phone'];
        $updated = $_POST['updated'];
        update_user($name_user,$avatar,$id,$phone,$updated);
        $_SESSION['user'] = get_user($id);
    }
    include 'views/site/profile/profile.php';

?>