<?php
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case "detail":
            $id = $_GET['id'];
            check_empty($id,ORDERS);
            $detail = orders_detail($id);
            $course = course_detail($detail['id_course']);
            include_once $direct_act;
            break;
        case "edit":
            $id             = $_POST['id'];
            $status         = $_POST['status'];
            $id_student     = $_POST['id_student'];
            $id_class       = $_POST['id_class'];
            $student        = student_detail($id_student);
            $class          = class_detail($id_class);
            $order          = orders_detail($id);
            $order_code     = $order['order_code'];
            update_orders($status,$id);
            if($status == 2){
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

        case "destroy":
            die(location(ORDERS));
            $id = $_POST['id_order'];
            check_empty($id,ORDERS);
            order_delete($id);
            alert('Xóa thành công !',ORDERS);
            break;
        default:
            location(BASE_URL."page_not_found");
            break;
    }
}else {
    if(isset($_GET['s'])){
        if(empty($_GET['s'])){
            location(ORDERS);
        }else {
            $read_order = orders_search($_GET['s']);
        }
    }
    elseif(isset($_GET['status'])){
        if($_GET['status'] == ''){
            location(ORDERS);
        }else {
            $read_order = order_filter($_GET['status']);
        }
    }
    else {
        $read_order = order_read();
    }
    include_once $direct_read;
}
?>



