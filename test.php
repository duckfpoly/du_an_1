<?php
    use PHPMailer\PHPMailer\PHPMailer;
    include 'vendor/autoload.php';
    $title = 'DDH Manager - SIGN UP ACCOUNT';
    $name = 'Nguyễn Quốc Huy';
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
    $mailer = new PHPMailer(true);
    $mailer->SMTPDebug = 0;
    $mailer->isSMTP();
    $mailer->Host       = 'smtp.gmail.com';
    $mailer->SMTPAuth   = true;
    $mailer->Username   = 'ndcake.store@gmail.com';
    $mailer->Password   = 'mswwgrjitnohamff';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port       = 587;
    $mailer->setFrom('ndcake.store@gmail.com', 'DDH Manager');
    $mailer->addAddress('ducntph27832@fpt.edu.vn');
    $mailer->isHTML(true);
    $mailer->AddReplyTo('ndcake.store@gmail.com', 'DDH Manager');
    $body = $output;
    $mailer->Subject = 'DDH Manager - '.$title;
    $mailer->Body = $body;
    $mailer->send();
?>