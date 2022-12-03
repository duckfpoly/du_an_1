<?php
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    if(isset($_POST['pass'])){
        $id = $data_user['id'];
        $new_pass = $_POST['pass'];
        $updated = $_POST['updated'];
        change_pass($new_pass,$updated,$id);
        $_SESSION['user'] = get_user($id);
    }
    include 'views/site/change_pass/change_pass.php';
?>