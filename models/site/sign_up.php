<?php
    function checkEmail ($email){
        $sql = "SELECT * FROM students WHERE email_student = '$email'";
        return query_one($sql);
    }
    function addUser($name, $email, $pass, $date){
        $sql = "INSERT INTO students(name_student, email_student, password_student, created_at,image_student) VALUES
        ('$name','$email','$pass','$date','avatar.png')";
        query_sql($sql);
    }

     function sign_up_gg($username,$name,$email,$password){
        $sql = "SELECT * FROM `tbl_user` WHERE email = ?";
        $check_email = query_one($sql, $email);
        if($check_email > 0) {
            $alert = "Email đã được sử dụng !";
            return $alert;
        }
        else{
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `tbl_user` SET `username` = ?, `name` = ?, `email` = ?,`password` = ?, `image` = 'user.png'";
            $create_user = query_sql($sql,$username,$name,$email,$pass);
            $output     = '<p>Dear ,'.$name.'</p>';
            $output .= '
                        <h1>Đăng ký tài khoản thành công</h1>
                        <p>X Store xin được gửi tài khoản và mật khẩu của quý khách:</p>
                        <ul>
                            <li><strong>Tài khoản: </strong>'.$username.'</li>
                            <li><strong>Mật khẩu: </strong>'.$password.'</li>
                        </ul>
                    ';
            $output .= '
                        <p>Nếu không phải bạn đăng ký <br>
                        Vui lòng nhấn <a href="mailto:ndcake.store@gmai.com">vào đây</a> để gửi email liên hệ lại với chúng tôi 
                        hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
                    ';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>ADMIN X SHOP</p>';
            send_mail($email,$output,"SIGN UP ACCOUNT");
            echo ' <script language="javascript"> alert("Đăng ký thành công ! Thông tin tài khoản đã được gửi vào mail của bạn."); location.href="sign_in";</script>';
        }
    }
?>