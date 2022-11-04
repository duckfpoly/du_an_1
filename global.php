<?php 
    require_once 'models/process.php';
    $url                    =  $_SERVER['REQUEST_URI'];
    $host                   =  'http://localhost/course_ddh/';
    define("DASHBOARD",     $host.'admin');  
    define("CATEGORIES",    $host.'admin/categories'); 
    define("COURSES",       $host.'admin/courses'); 
    define("TEACHERS",      $host.'admin/teachers'); 
    define("STUDENTS",      $host.'admin/students'); 
    define("BILLS",         $host.'admin/bills'); 
    define("STAFFS",        $host.'admin/staffs'); 
    if(isset($_GET['module'])){
        $module = $_GET['module'];
        require_once 'controllers/admin/'.$module.'/'.$module.'Controller.php';
        require_once 'models/m_'.$module.'.php';
        $dir_img = $host.'assets/uploads/'.$module.'/';
    }else {
        $module = '';
        $dir_img = '';
    }
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
    function save_file($fieldname, $name_dir){
        $target_dir = 'assets/uploads/'.$name_dir.'/';
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }
?>  
