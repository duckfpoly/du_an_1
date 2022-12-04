<?php
    if (isset($_GET['action'])) {
        $act = $_GET['action'];
        switch ($act) {
            case "create":
                $courses_read   = courses_read();
                include_once $direct_act;
                break;
            case "store":
                $name_class = $_POST['name_class'];
                $id_course  = $_POST['id_category'];
                $time_learn = $_POST['time_learn'];
                $time_start = $_POST['time_start'];
                $time       = strtotime ( '+6 month' , strtotime ( $time_start ) ) ;
                $time_end   = date ( 'Y-m-d' , $time );
                check_empty($name_class,CLASS_TEACHER . "/create");
                check_empty($id_course, CLASS_TEACHER . "/create");
                check_empty($time_start,CLASS_TEACHER . "/create");
                check_data(check_course_class($id_course),CLASS_TEACHER . "/create");
                class_create($name_class,$id_course,$id_teacher,$time_learn,$time_start,$time_end);
                location(CLASS_TEACHER);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id, CLASS_TEACHER);
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                $courses_read   = courses_read();
                include_once $direct_act;
                break;
            case "edit":
                $id = $_GET['id'];
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                check_empty($id, CLASS_TEACHER);
                $name_class     = $_POST['name_class'];
                $id_course      = $_POST['id_category'];
                $time_learn     = $_POST['time_learn'];
                $time_start     = $_POST['time_start'];
                $status_class   = $_POST['status_class'];
                $time_end       = date ( 'Y-m-d' , strtotime ( '+6 month' , strtotime ( $time_start ) ) );
                class_update($name_class,$id_course,$time_learn,$time_start,$time_end,$status_class,$id);
                location(CLASS_TEACHER);
                break;
            case "destroy":
                $id = $_GET['id'];
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                $courses_update = course_detail($id);
                check_id_teacher_login(getSession('user')['id'],$courses_update['id_teacherr'],CLASS_TEACHER);
                check_empty($id, CLASS_TEACHER);
                class_delete($id);
                location(CLASS_TEACHER);
                break;
            case "showStudent":
                $id = $_GET['id'];
                check_empty($id,CLASS_TEACHER);
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                $studentClass   = read_students_class($id);
                include_once $direct_act;
                break;
            case "deleteStudent":
                $id_student = $_POST['id_student'];
                $id_class   = $_POST['id_class'];
                delete_student_class($id_student,$id_class);
                alert('Xóa thành công !',CLASS_TEACHER);
                break;
            default:
                location(BASE_URL . "page_not_found");
                break;
        }
    } else {
        if (isset($_GET['classes'])) {
            if (empty($_GET['classes'])) {
                location(CLASS_TEACHER);
            }
            else {
                $read_class = teacher_class_search($_GET['classes'],$id_teacher);
            }
        }
        else {
            $read_class = get_class_teacher($id_teacher);
        }
        include_once $direct_read;
    }
?>


