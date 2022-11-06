<?php 
    require_once 'models/process.php';
    require_once 'models/m_categories.php';
    require_once 'models/m_courses.php';
    require_once 'models/m_teachers.php';
    $url                    =  $_SERVER['REQUEST_URI'];
    $host                   =  'http://localhost/course_ddh/';
    $admin                  =  'http://localhost/course_ddh/admin/';
    // url admin
    define("DASHBOARD",     $host.'admin');
    define("CATEGORIES",    $host.'admin/categories'); 
    define("COURSES",       $host.'admin/courses'); 
    define("TEACHERS",      $host.'admin/teachers'); 
    define("STUDENTS",      $host.'admin/students'); 
    define("BILLS",         $host.'admin/bills'); 
    define("STAFFS",        $host.'admin/staffs'); 
    // url site
    define("HOME",          $host);  
    define("LESSON",        $host.'lesson');
    define("ABOUT",         $host.'about'); 
    define("CONTACT",       $host.'contact');

    function active_item($item){
        if(!empty($item)){
            echo '<script>document.getElementById("'.$item.'").classList.add("active");</script>';
        }
        else {
            echo '<script>document.getElementById("dashboard").classList.add("active");</script>';
        }
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
                die(alert($check_data,$url));
            }
        }
    }

    function check_data($data_check,$url){
        $check_data = $data_check;
        if(isset($check_data)){
            die(alert($check_data,$url));
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
