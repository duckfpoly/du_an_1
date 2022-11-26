<?php
    function login_admin($username,$password) {
        $query = "SELECT * FROM account_manager WHERE username = '$username'";
        $value = query_one($query);
        if(isset($value['username'])){
            if($value['status'] == 1 ){
                return "Tài khoản của bạn đã bị vô hiệu hóa !";
            }
            else {
                $checkPass = password_verify($password, $value['password']);
                if ($checkPass > 0) {
                    setSession('scope',$value['scope']);
//                    set_Cookie('scope', $value['scope'], 999);
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
    function login_admin_gg($email){
        $query = "SELECT * FROM account_manager WHERE email = '$email'";
        $value = query_one($query);
        if(isset($value['email'])){
            if($value['status'] == 1) {
                return "Tài khoản của bạn đã bị vô hiệu hóa !";
            }
            else {
              setSession('scope',$value['scope']);
//                set_Cookie('scope', $value['scope'], 999);
                location('admin');
            }
        }
        else {
            return "Tài khoản chưa được đăng ký !";
        }
    }
?>