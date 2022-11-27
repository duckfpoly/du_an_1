<?php
      $host                   = 'http://localhost/courses/';
//     $host                   =  'http://localhost/coursesWeb/du_an_1/';
    //    $host                   = 'http://localhost/hangdtph27628/';
    $admin                  =  $host.'admin/';

    define("BASE_URL",     $host);
    define("ADMIN",        $host.'admin');
    define("ADMIN_URL",    $host.'admin/');

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

    $dir_config                 = 'config/';
    $dir_model                  = 'models/';
    $dir_model_admin            = 'models/admin/';
    $dir_model_site             = 'models/site/';
    $dir_model_manager  = 'models/manager/';

    require_once $dir_config.'db.php';
    require_once $dir_config.'session.php';
    require_once $dir_config.'cookie.php';
    require_once $dir_config.'vnpay.php';

    require_once $dir_model.'process_db.php';

    require_once $dir_model_manager.'teacher.php';

    require_once $dir_model_admin.'accounts.php';
    require_once $dir_model_admin.'categories.php';
    require_once $dir_model_admin.'courses.php';
    require_once $dir_model_admin.'teachers.php';
    require_once $dir_model_admin.'students.php';
    require_once $dir_model_admin.'classes.php';
    require_once $dir_model_admin.'bills.php';
    require_once $dir_model_admin.'orders.php';
    require_once $dir_model_admin.'sales.php';
    require_once $dir_model_admin.'statistical.php';
    require_once $dir_model_admin.'rates.php';

    require_once $dir_model_site.'categories.php';
    require_once $dir_model_site.'courses.php';
    require_once $dir_model_site.'payment.php';
    require_once $dir_model_site.'sign_in.php';
    require_once $dir_model_site.'sign_up.php';
    require_once $dir_model_site.'pass_handle.php';

    // url admin
    define("DASHBOARD",     $host.'admin');
    define("CATEGORIES",    $admin.'categories');
    define("COURSES",       $admin.'courses');
    define("TEACHERS",      $admin.'teachers');
    define("STUDENTS",      $admin.'students');
    define("BILLS",         $admin.'bills');
    define("ORDERS",        $admin.'orders');
    define("RATES",         $admin.'rates');
    define("CLASSES",       $admin.'classes');
    define("SALES",         $admin.'sales');
    define("SIGNOUT",       $admin.'logout');
    define("STATISTICAL",   $admin.'statistical');

    // url site
    define("HOME",          $host);  
    define("LESSONS",       $host.'lessons');
    define("MYCOURSES",     $host.'mycourses');
    define("MYCOURSE",      $host.'mycourse');
    define("ABOUT",         $host.'about');
    define("CONTACT",       $host.'contact');
    define("PAYMENT",       $host.'payment');
    define("SIGUP",         $host.'account/sign_up');
    define("SIGIN",         $host.'account/sign_in');
    define("LOGOUT",        $host.'account/log_out');

    // teacher manager
    define("DASHBOARD_TEACHER",        $host.'teacher_manager');
    define("COURSE_TEACHER",           $host.'teacher_manager/my_course');
    define("CLASS_TEACHER",            $host.'teacher_manager/my_class');
    define("TEACHING_SCHEDULE",        $host.'teacher_manager/teaching_schedule');

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
            return isset($_GET['v']) == true ? strtoupper($_GET['v']) : "Courses App" ;
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
            return 0;
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
?>