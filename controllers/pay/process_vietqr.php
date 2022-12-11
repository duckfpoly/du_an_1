<?php
    $output  = '<p>Thân gửi, '.$student['name_student'].'</p>';
    $output .= '
        <h1>Cảm ơn bạn đã đăng ký lớp '.$class['name_class'].' thuộc khóa học '.$class['name_course'].'!</h1>
        <p>➡<strong>Thông tin hóa đơn:</strong></p>
        <table border="1">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$order_code.'</td>
                    <td>Chưa thanh toán</td>
                </tr>
            </tbody>
        </table>
        <p>➡<strong>Thông tin lớp học đăng ký:</strong></p>  
        <table border="1">
            <thead>
                <tr>
                    <th>Tên lớp</th>
                    <th>Giảng viên</th>
                    <th>Ngày học</th>
                    <th>Khai giảng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$class['name_class'].'</td>
                    <td>'.$class['name_teacher'].'</td>
                    <td>'.$class['time_learn'].'</td>
                    <td>'.$class['time_start'].'</td>
                </tr>
            </tbody>
        </table>
    ';
    $output .= '
        <p>Vui lòng thanh toán trong 24h. Nếu không đơn đăng ký này sẽ tự động hủy</p>
        <h3>Thanh toán</h3>
        <p>
            <ul>
            <li>Số tài khoản: 0823565831</li>
            <li>Ngân hàng MBBank: 0823565831</li>
            <li>Chủ tài khoản: TRUNG TAM DAY HOC LAP TRINH HDO</li>
            </ul>
        </p>
    ';
    $output .= '
        <p>Nếu không phải bạn đăng ký <br>
        Vui lòng nhấn <a href="mailto:thienduc.nguyen098@gmail.com">vào đây</a> để gửi email liên hệ lại với chúng tôi
        hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
    ';
    $output .= '<p>Cảm ơn,</p>';
    $output .= '<p>DDH Teams</p>';
    send_mail($student['email_student'],$output,"CLASS REGISTRATION");
    include 'views/pay/ck.php';
?>