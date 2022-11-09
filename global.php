<?php
    $host                   =  'http://localhost/coursesWeb/du_an_1/';
    $admin                  =  $host.'admin/';

    $dir_model  = 'models/';
    $dir_model_site = 'models/site/';
    $dir_config = 'config/';

    require_once $dir_config.'db.php';
    include_once $dir_config.'session.php';

    require_once $dir_model.'process_db.php';
    require_once $dir_model.'accounts.php';
    require_once $dir_model.'categories.php';
    require_once $dir_model.'courses.php';
    require_once $dir_model.'teachers.php';
    require_once $dir_model.'students.php';
    require_once $dir_model.'classes.php';
    require_once $dir_model.'bills.php';
    require_once $dir_model.'sales.php';
    // client
    require_once $dir_model_site.'courses.php';
    require_once $dir_model_site.'categories.php';

    // url admin
    define("DASHBOARD",     $host.'admin');
    define("CATEGORIES",    $admin.'categories');
    define("COURSES",       $admin.'courses');
    define("TEACHERS",      $admin.'teachers');
    define("STUDENTS",      $admin.'students');
    define("BILLS",         $admin.'bills');
    define("SALES",         $admin.'sales');
    define("RATES",         $admin.'rates');
    define("CLASSES",       $admin.'classes');
    define("LOGOUT",        $admin.'logout');

    // url site
    define("HOME",          $host);  
    define("LESSONS",       $host.'lessions');
    define("ABOUT",         $host.'about');
    define("CONTACT",       $host.'contact');

    function active_item($item){
        echo '<script>document.getElementById("'.$item.'").classList.add("active");</script>';
    }

    function location($url){
        echo '<script>window.location="'.$url.'";</script>';
    }

    function alert($text,$url){
        echo '<script>alert("'.$text.'"); window.location="'.$url.'";</script>';
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

    function check_empty($data,$redirect){
        if(empty($data)){
            location($redirect);
        }
    }

    function compare_data($data_post,$data_compare,$fn_check,$url){
        if($data_post != $data_compare) {
            $check_data = $fn_check;
            if (isset($check_data)) {
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
                                                <p>'.$check_data.'</p>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <button type="button" onclick="return_page()" class="btn btn-outline-secondary">Quay lại</button>
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
        $check_data = $data_check;
        if(isset($check_data)){
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
                                                <p>'.$check_data.'</p>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <button type="button" onclick="return_page()" class="btn btn-outline-secondary">Quay lại</button>
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

    function total($price,$discount){
        $price = $price;
        $discount = $discount;
        if(empty($discount)){
            $total = $price;
            return number_format($total, 0, '', ',')."vnđ";
        }
        else {
            $money = ($price * $discount) /100;
            $total = $price - $money;
            return number_format($total, 0, '', ',')." $" ;
        }
    }

    function pagination_normal($tbl,$limit_data){
        $sql = "SELECT count(id) AS total FROM $tbl";
        $row = query_one($sql);
        $total_records = $row['total'];
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

    // current page: get page url
    // total page: tổng số bản ghi của một table chia cho số bản ghi muốn hiện ra màn hình
    function pagination($current_page, $total_page, $url){
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="' . $url . '?page=' . ($current_page - 1) . '"><</a>';
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

    function check_time_end($date){
        $time_end = strtotime ( '+6 month' , strtotime ( $date ) ) ;
        $time_end = date ( 'Y-m-d' , $time_end );
        return strtotime(date('Y-m-d')) == strtotime($time_end) ? "true" : "false";
    }

    function check_time_start($date){
        $time_start =   strtotime ($date);
        $time_now   =   strtotime(date('Y-m-d'));
        return $time_start == $time_now ? "true" : "false";
    }

    function format_date($date){
        return (new DateTimeImmutable($date))->format('d/m/Y');
    }
?>
