<?php
    function checkUser ($email,$username){
        $sql = "SELECT * FROM students WHERE email_student = '$email' || username_student = '$username'";
        return query_one($sql);
    }
    function addUser($name, $email, $pass, $date,$user_name){
        $han_pass = password_hash($pass,PASSWORD_DEFAULT);
        $sql = "INSERT INTO students(name_student, email_student, password_student, created_at,image_student,username_student) VALUES
        ('$name','$email','$han_pass','$date','avatar.png','$user_name')";
        query_sql($sql);
    }
     function sign_up_gg($name,$email,$password,$created_at){
        $sql = "SELECT * FROM `students` WHERE email_student = ?";
        $check_email = query_one($sql, $email);
        if($check_email > 0) {
            return "Email đã được sử dụng !";
        }
        else{
            $pass = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `students` SET 
                `name_student`      = ?, 
                `email_student`     = ?,
                `password_student`  = ?, 
                `image_student`     = 'avatar.png',
                `created_at`        = ?
           ";
            $create_user = query_sql($sql,$name,$email,$pass,$created_at);
            $output     = '<p>Dear ,'.$name.'</p>';
            $output .= '
                <h1>Đăng ký tài khoản thành công !</h1>
                <p>COURSES APP xin gửi tài khoản và mật khẩu của học viên:</p>
                <ul>
                    <li><strong>Tài khoản: </strong>'.$email.'</li>
                    <li><strong>Mật khẩu: </strong>'.$password.'</li>
                </ul>
            ';
            $output .= '
                <p>Nếu không phải bạn đăng ký <br>
                Vui lòng nhấn <a href="mailto:ndcake.store@gmai.com">vào đây</a> để gửi email liên hệ lại với chúng tôi 
                hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
            ';
            $output .= '<p>Thanks,</p>';
            $output .= '<p>ADMIN COURSES APP</p>';
            send_mail($email,$output,"SIGN UP ACCOUNT");
            // xử lý đăng nhập sau khi đăng ký thành công
            $check = query_one("SELECT * FROM students WHERE email_student = '$email'");
            setSession('user',$check);
            echo ' <script language="javascript"> 
                            alert("Đăng ký thành công ! Thông tin đăng nhập đã được gửi vào mail của bạn."); 
                            location.href="'.BASE_URL.'";
                    </script>';
        }
    }
?>