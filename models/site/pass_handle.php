<?php
    function action_forgot_pass($email){
        $sql = "SELECT * FROM `students` WHERE email_student = ?";
        $check_email = query_one($sql, $email);
        if(!isset($check_email['email_student'])) {
            $alert = "Email không tồn tại !";
            return $alert;
        }
        else {
            $expFormat = mktime(
                date("H"),
                date("i") + 10,
                date("s"),
                date("m"),
                date("d"),
                date("Y")
            );
            $expDate = date("Y-m-d H:i:s", $expFormat);
            $key = md5((2418 * 2) . $email);
            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
            $key = $key . $addKey;
            insert_password_reset_temp($email,$key,$expDate);
            $output = '<p>Dear user,</p>';
            $output .= '<p>Vui lòng click vào liên kết sau để đặt lại mật khẩu của bạn.</p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p><a href="'.BASE_URL.'account/reset_pass?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">Đặt lại mật khẩu</a></p>';
            $output .= '<p>-------------------------------------------------------------</p>';
            $output .= '<p>Liên kết sẽ hết hạn sau 10 phút vì lý do bảo mật.</p>';
            $output .= '<p>Nếu bạn không yêu cầu email quên mật khẩu này, không có hành động nào
                            là cần thiết, mật khẩu của bạn sẽ không được đặt lại. Tuy nhiên, bạn có thể muốn đăng nhập vào
                            tài khoản của bạn và thay đổi mật khẩu bảo mật của bạn như ai đó có thể đã đoán ra.</p>';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>ADMIN TEAM X STORE</p>';
            send_mail($email,$output,"RESET PASSWORD");
            alert('Một email đã được gửi với hướng dẫn về cách đặt lại mật khẩu của bạn','https://mail.google.com/');
        }
    }

    function insert_password_reset_temp($email,$key,$expdate){
        $sql = "INSERT INTO `password_reset_temp` SET `email` = ?, `keyy` = ?, `expDate` = ?";
        query_sql($sql,$email,$key,$expdate);
    }

    function password_reset_temp($email,$keyy){
        $sql = "SELECT * FROM `password_reset_temp` WHERE `email` = ? AND `keyy` = ?";
        return query_one($sql, $email, $keyy);
    }

    function reset_password($new_password,$email){
        $sql = " UPDATE `students` SET `password_student` = ? WHERE email_student = ?";
        query_sql($sql,$new_password,$email);
    }

    function delete_code_reset_pass($email){
        $sql = "DELETE FROM `password_reset_temp` WHERE `email` = ?";
        query_sql($sql,$email);
    }
?>