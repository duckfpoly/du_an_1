<?php
    function login_admin($username,$password) {
        $query = "SELECT * FROM account_manager WHERE username = '$username' ";
        $value = query_one($query);
        if(isset($value['username'])){
            if($value['status'] == 1 ){
                return "Tài khoản của bạn đã bị vô hiệu hóa !";
            }
            else {
                $checkPass = password_verify($password, $value['password']);
                if ($checkPass > 0) {
                    setSession('scope',$value['scope']);
                    return '<script>window.location="admin";</script>';
                } else {
                    return "Sai mật khẩu !";
                }
            }
        }
        else {
            return "Tài khoản không tồn tại !";
        }
    }
?>