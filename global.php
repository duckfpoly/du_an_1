<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once 'vendor/autoload.php';
    $client         = new Google\Client();
    $google_oauth   = new Google\Service\Oauth2($client);
    $client->setClientId("860322000129-aa3jsl9jc2upei7jjitjeknhol9p552f.apps.googleusercontent.com");
    $client->setClientSecret("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");
    $client->addScope("email");
    $client->addScope("profile");
    include 'config/inc.php';

    function active_item($item){
        echo '<script>document.getElementById("'.$item.'").classList.add("active");</script>';
    }

    function location($url){
        echo '<script>window.location="'.$url.'";</script>';
    }

    function return_empty_data($data){
        if(empty($data) || $data == '' ){
            return 0;
        }
        else {
            return $data;
        }
    }

    function alert($text,$url){
        echo '<script>alert("'.$text.'"); window.location="'.$url.'";</script>';
    }

    function show_error($message,$url){
        die('<section class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <div class="text-center">
                                <h3>Lỗi xử lý dữ liệu !</h3>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-3">
                                <div class="form-group text-danger text-center">
                                    <p>'.$message.'</p>
                                </div>
                                <div class="mt-5 text-center">
                                    <a href="'.$url.'" class="btn btn-outline-secondary">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>');
    }

    function save_file($fieldname, $name_dir){
        $target_dir = 'assets/uploads/'.$name_dir.'/';
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }

    function title_tab($data,$home){
        if(isset($_GET[$data])){
            echo strtoupper($_GET[$data]);
        }
        else {
            echo strtoupper($home);
        }
    }

    function title_site(){
        if(isset($_GET['id'])){
            return strtoupper($_GET['v']).' - '.course_detail($_GET['id'])['name_course'];
        }
        else {
            return isset($_GET['v']) == true ? strtoupper($_GET['v']) : "Trung tâm HDO" ;
        }
    }

    function check_empty($data,$redirect){
        if(empty($data)){
            alert('Dữ liệu '. $data.' rỗng!',$redirect);
        }
    }

    function compare_data($data_post,$data_compare,$fn_check,$url){
        if($data_post != $data_compare) {
            if (isset($fn_check)) {
                die('<section class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <div class="text-center">
                                        <h3>Lỗi xử lý dữ liệu !</h3>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="p-3">
                                        <div class="form-group text-danger text-center">
                                            <p>'.$fn_check.'</p>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <a href="'.$url.'" class="btn btn-outline-secondary">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>');
            }
        }
    }

    function check_data($data_check,$url){
        if(isset($data_check)){
            die('<section class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <div class="text-center">
                                        <h3>Lỗi xử lý dữ liệu !</h3>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="p-3">
                                        <div class="form-group text-danger text-center">
                                            <p>'.$data_check.'</p>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <a href="'.$url.'" class="btn btn-outline-secondary">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>');
        }
    }

    function send_mail($mail,$output,$title){
        $mailer         = new PHPMailer(true);
        $mailer->SMTPDebug = 0;
        $mailer->isSMTP();
        $mailer->Host       = 'smtp.gmail.com';
        $mailer->SMTPAuth   = true;
        $mailer->Username   = 'ndcake.store@gmail.com';
        $mailer->Password   = 'mswwgrjitnohamff';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port       = 587;
        $mailer->setFrom('ndcake.store@gmail.com', 'DDH Manager');
        $mailer->addAddress($mail);
        $mailer->isHTML(true);
        $mailer->AddReplyTo('ndcake.store@gmail.com', 'DDH Manager');
        $body = $output;
        $mailer->Subject = 'DDH Manager - '.$title;
        $mailer->Body = $body;
        $mailer->send();
    }

    function cut_email($email){
        $string = $email;
        $return = strrev($string);
        $string_confirm = strstr($return, '@');
        $final = strrev($string_confirm) ;
        return chop($final,"@");
    }

    function total_no_fomat($price,$discount){
        if(empty($discount)){
            return $price;
        }
        else {
            $money = ($price * $discount) /100;
            return $price - $money;
        }
    }

    function total($price,$discount){
        if(empty($discount)){
            $total = $price;
            return number_format($total, 0, '', ',')." VNĐ";
        }
        else {
            $money = ($price * $discount) /100;
            $total = $price - $money;
            return number_format($total, 0, '', ',')." VNĐ" ;
        }
    }

    function pagination_normal($tbl,$limit_data){
        $sql = "SELECT count(id) AS total FROM $tbl";
        $row = query_one($sql);
        $total_records = $row['total'];
        if($total_records != 0){
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = $limit_data;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $data_pani = "SELECT * FROM $tbl LIMIT $start, $limit";
            $row = query($data_pani);
            $arr = [$row, $current_page, $total_page];
            return $arr;
        }
        else {
            $data_pani = "SELECT * FROM $tbl";
            return [query($data_pani), 0, 0];
        }
    }

    function pagination($current_page, $total_page, $url){
        if ($current_page > 1 && $total_page > 1) {
            echo '<a class="" href="' . $url . '?page=' . ($current_page - 1) . '"><</a>';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span class="active">' . $i . '</span> ';
            } else {
                echo '<a href="' . $url . '?page=' . $i . '">' . $i . '</a> ';
            }
        }
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="' . $url . '?page=' . ($current_page + 1) . '">></a> ';
        }
    }

    function pagination_search($tbl,$values_search,$key,$limit_data){
        $sql = "SELECT count(id) AS total FROM $tbl";
        $row = query_one($sql);
        $total_records = $row['total'];
        if($total_records != 0){
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = $limit_data;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $data_pani = "SELECT * FROM $tbl WHERE $values_search LIKE '%$key%' LIMIT $start, $limit";
            $row = query($data_pani);
            $arr = [$row, $current_page, $total_page];
            return $arr;
        }
        else {
            $data_pani = "SELECT * FROM $tbl WHERE $values_search LIKE '%$key%'";
            return [query($data_pani), 0, 0];
        }
    }

    function pagination_filter($tbl,$values_search,$key,$limit_data){
        $sql = "SELECT count(id) AS total FROM $tbl";
        $row = query_one($sql);
        $total_records = $row['total'];
        if($total_records != 0){
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = $limit_data;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $data_pani = "SELECT * FROM $tbl WHERE $values_search = $key LIMIT $start, $limit";
            $row = query($data_pani);
            $arr = [$row, $current_page, $total_page];
            return $arr;
        }
        else {
            $data_pani = "SELECT * FROM $tbl WHERE $values_search = $key";
            return [query($data_pani), 0, 0];
        }
    }

    function check_time_end($date){
        $time_end = strtotime ( '+6 month' , strtotime ( $date ) ) ;
        $time_end = date ( 'Y-m-d' , $time_end );
        return strtotime(date('Y-m-d')) == strtotime($time_end) ? "true" : "false";
    }

    function check_time_start($date){
        $time_start =   strtotime ($date);
        $time_now   =   strtotime(date("Y-m-d H:i:s"));
        return $time_start == $time_now ? true : false;
    }

    function format_date($date){
        return (new DateTimeImmutable($date))->format('d/m/Y');
    }

    function format_datetime($type_fomat,$date){
        if($type_fomat == 'datetime'){
            return (new DateTimeImmutable($date))->format('H:i:s - d/m/Y');
        }
        else {
            return (new DateTimeImmutable($date))->format('d/m/Y');
        }
    }

    function signupgg($client,$google_oauth){
        $client->setRedirectUri("http://localhost/courseddh/sign_up");
        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $google_account_info = $google_oauth->userinfo->get();
            $email      =  $google_account_info->email;
            $name_user  =  $google_account_info->name;

            $username   =  cut_email($email);
            $password   =  rand(0,999999);
            $create     =  sign_up_gg($username,$name_user,$email,$password);
        }
        include 'view/site/account/sign_up.php';
    }

    function cal_percent($obj,$sum){
        if(empty($sum)){
            return 100;
        }else {
            return round(($obj / $sum) * 100);
        }
    }

    function rand_code($length) {
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $size = strlen( $chars );
        $str = '';
        for( $i = 0; $i < $length; $i++ ) {
            $str .= $chars[ rand( 0, $size - 1 ) ];
        }
        return $str;
    }

    function check_id_teacher_login($id_account_login_teacher,$id_teacher_course,$url){
        if($id_account_login_teacher != $id_teacher_course){
            die('
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card mb-4">
                                                <div class="card-header pb-0">
                                                    <div class="text-center">
                                                        <h3 class="text-danger">Cảnh báo !</h3>
                                                    </div>
                                                </div>
                                                <div class="card-body px-0 pt-0 pb-2">
                                                    <div class="p-3">
                                                        <div class="form-group text-danger text-center">
                                                            <p>Khóa học giảng viên truy cập không thuộc quản lý của giảng viên. Giảng viên có thể bị cấm dạy nếu còn truy cập trái phép khóa học mà không phải giảng viên tạo !</p>
                                                        </div>
                                                        <div class="mt-5 text-center">
                                                            <a href="'.$url.'" class="btn btn-outline-secondary">
                                                                Quay lại
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ');
        }
    }

    function fomat_image_base64($name_image){
        $path = 'assets/uploads/courses/'.$name_image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }

    function notifications($channel,$message,$events){
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'fdd2d88095b96edb92f5',
            'd16dbc84782402e40487',
            '1516523',
            $options
        );
        $data['message'] = $message;
        $pusher->trigger($channel, $events, $data);
//        $pusher->trigger('courses-app', 'notice', $data);
    }


?>