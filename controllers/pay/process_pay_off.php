<?php
    $output  = '<p>Thân gửi, '.$student['name_student'].'</p>';
    $output .= '
        <h1>Đăng ký lớp '.$class['name_class'].' thuộc khóa học '.$class['name_course'].' thành công !</h1>
        <p>➡<strong>Thông tin hóa đơn:</strong></p>
        <table>
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>'.$order_code.'</td>
                    <td>Chờ thanh toán</td>
                </tr>
            </tbody>
        </table>
        <p>➡<strong>Thông tin lớp học đăng ký:</strong></p>  
        <table>
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
        <p>Nếu không phải bạn đăng ký <br>
        Vui lòng nhấn <a href="mailto:thienduc.nguyen098@gmail.com">vào đây</a> để gửi email liên hệ lại với chúng tôi
        hoặc có thể liên hệ trực tiếp qua số điện thoại: <a href="tel:+84823565831">+8482 3565 831</a></p>
    ';
    $output .= '<p>Cảm ơn,</p>';
    $output .= '<p>DDH Teams</p>';
    send_mail($student['email_student'],$output,"ĐĂNG KÝ KHÓA HỌC");
    include 'views/pay/off.php';
?>