<?php
    if(isset($_GET['action'])){
        if($_GET['action'] == 'reset'){
            $key    = $_GET['key'];
            $email  = $_GET['email'];
            $curDate = date("Y-m-d H:i:s");
            $check = password_reset_temp($email,$key);
            if($key != $check['keyy'] && $email != $check['email']){
                show_error('
                <h2>Liên kết không hợp lệ</h2>
                <p>Liên kết không hợp lệ / hết hạn. Hoặc bạn đã không sao chép đúng liên kết từ email hoặc bạn đã sử dụng khóa trong trường hợp đó đã ngừng hoạt động.</p>
                <p><a href="'.BASE_URL.'account/forgot_pass">Click here</a> to reset password.</p>',BASE_URL.'account/forgot_pass');
            }
            else {
                $expDate = $check['expDate'];
                if ($expDate >= $curDate){
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        reset_password($_POST['password'],$email);
//                        delete_code_reset_pass($email);
                        alert('Đặt lại mật khẩu thành công ! Giờ thì đăng nhập thôi.',BASE_URL.'account/sign_in');
                    }
                    include "views/account/reset_pass.php";
                }
                else{
                    show_error('Liên kết đã hết hạn. Bạn đang cố sử dụng liên kết đã hết hạn chỉ có hiệu lực trong 15 phút (sau khi yêu cầu).',BASE_URL.'account/forgot_pass');
                }
            }
        } else {
            location(BASE_URL);
        }
    }else {
        location(BASE_URL);
    }
?>