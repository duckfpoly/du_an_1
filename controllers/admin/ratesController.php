<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'destroy':
                $id = $_GET['id'];
                delete_rate($id);
                alert('Xóa thành công !',RATES);
                break;
            case 'update-status';
                $id_rate    = $_POST['id_rate'];
                $status     = $_POST['status'];
                update_status_rate($status,$id_rate);
                location(RATES);
            break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        $all_course = get_all_courses();
        if(isset($_GET['c'])){
            $id = $_GET['c'];
            $read_comment = filter_course($id);
        }else{
            $read_comment = get_all_cmt();
        }
        include_once $direct_read;
    }
?>
