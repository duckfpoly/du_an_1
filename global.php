<?php
    $dir_model = 'models/';

    require_once $dir_model.'process_db.php';
    require_once $dir_model.'categories.php';
    require_once $dir_model.'courses.php';
    require_once $dir_model.'teachers.php';
    require_once $dir_model.'students.php';
    require_once $dir_model.'bills.php';
    require_once $dir_model.'sales.php';
    require_once $dir_model.'staffs.php';

    $host                   =  'http://localhost/course_ddh/';
    $admin                  =  'http://localhost/course_ddh/admin/';

    // url admin
    define("DASHBOARD",     $host.'admin');
    define("CATEGORIES",    $host.'admin/categories'); 
    define("COURSES",       $host.'admin/courses'); 
    define("TEACHERS",      $host.'admin/teachers'); 
    define("STUDENTS",      $host.'admin/students');
    define("SALES",         $host.'admin/sales');
    define("BILLS",         $host.'admin/bills');
    define("STAFFS",        $host.'admin/staffs');

    // url site
    define("HOME",          $host);  
    define("LESSONS",        $host.'lessions'); 
    define("DETAIL",        $host.'detail'); 
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

?>
<script>
    function return_page(){
        history.back();
    }
</script>