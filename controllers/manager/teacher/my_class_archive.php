<?php
    if (isset($_GET['action'])) {
        $act = $_GET['action'];
        switch ($act) {
            case "showStudent":
                $id = $_GET['id'];
                check_empty($id,CLASSARCHIVE_TEACHER);
                $update_class   = classarchive_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASSARCHIVE_TEACHER);
                $studentClass   = read_students_class_archive($id);
                include_once $direct_act;
                break;
            default:
                location(BASE_URL . "page_not_found");
                break;
        }
    } else {
        $read_class = teacher_get_class_archive($id_teacher);
        include_once $direct_read;
    }

?>