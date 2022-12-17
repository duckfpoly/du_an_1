<?php
    include 'views/site/change_pass/change_pass.php';
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    if(isset($_POST['pass'])){
        $id = $data_user['id'];
        $new_pass = $_POST['pass'];
        $pass = $_POST['password'];
        $updated = $_POST['updated'];
        // change_pass($new_pass,$updated,$id);
        // $_SESSION['user'] = get_user($id);
        $check = password_verify($pass, $_SESSION['user']['password_student']);
        if($check > 0){
            $data_item = array(
                'message'  => 'Cập nhật thành công'
            );
            return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
        }else{
            $data_item = array(
                'message'  => 'Mật khẩu cũ không đúng'
            );
            return html_entity_decode( json_encode($data_item, JSON_UNESCAPED_UNICODE) );
        }
    }
?>