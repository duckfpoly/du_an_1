<?php 
    require_once 'models/process.php';
    require_once 'models/m_categories.php';
    require_once 'models/m_courses.php';
    $url                    =  $_SERVER['REQUEST_URI'];
    $host                   =  'http://localhost/course_ddh/';
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
    define("COURSE",        $host.'course'); 
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
    function alert($text){
        echo '<script>alert("'.$text.'");</script>';
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
    function check_id($id){
        if(empty($id)){
            location(COURSES);
        }
        exit();
    }
?>  
