<?php
    if(isset($_GET['vnp_SecureHash'])){
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $order_id       = $_GET['vnp_TxnRef'];
        $order_code = $order_id;
        $order_amount   = $_GET['vnp_Amount'];
        $order_bank     = $_GET['vnp_BankCode'];
        $pay_time       = $_GET['vnp_PayDate'];
        // cập nhật trạng thái lên db
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                // giao dịch thành công
                $status = 2;
                update_status_orders($status,$order_id);
                $get_data_order = get_order($order_id);
                $id_student = $get_data_order['id_students'];
                $id_class   = $get_data_order['id_class'];
                $student = student_detail($id_student);
                $class  = class_detail($id_class);
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
                                <td>Đã thanh toán</td>
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
            }
            else {
                // giao dịch hủy
                $status = 1;
                update_status_orders($status,$order_id);
                $get_data_order = get_order($order_id);
                $id_student = $get_data_order['id_students'];
                $id_class   = $get_data_order['id_class'];
                $student    = student_detail($id_student);
                $class      = class_detail($id_class);
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
                                <td>Thanh toán bị hủy</td>
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
            }
        }
        else {
            // chưa thanh toán
            $status = 0;
            update_status_orders($status,$order_id);
            $get_data_order = get_order($order_id);
            $id_student = $get_data_order['id_students'];
            $id_class   = $get_data_order['id_class'];
            $student    = student_detail($id_student);
            $class      = class_detail($id_class);
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
                            <td>Chưa thanh toán</td>
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
        }
        include 'views/pay/status_pay.php';
    }
    else {
        location(BASE_URL);
    }
?>

