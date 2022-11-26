<?php
    if (isset($_GET['action'])) {
        $act = $_GET['action'];
        switch ($act) {
            case "create":
                $courses_read   = get_course_teacher($id_teacher);
                include_once $direct_act;
                break;
            case "store":
                // lấy dữ liệu từ form
                $name_class = $_POST['name_class'];
                $id_course  = $_POST['id_category'];
                $time_learn = $_POST['time_learn'];
                $time_start = $_POST['time_start'];
                $time = strtotime ( '+6 month' , strtotime ( $time_start ) ) ;
                $time_end = date ( 'Y-m-d' , $time );
                // kiểm tra rỗng
                check_empty($name_class,CLASS_TEACHER . "/create");
                check_empty($id_course, CLASS_TEACHER . "/create");
                check_empty($time_learn,CLASS_TEACHER . "/create");
                check_empty($time_start,CLASS_TEACHER . "/create");
                check_data(check_course_class($id_course),CLASS_TEACHER . "/create");
                // Gọi model để thêm dữ liệu vào database
                class_create($name_class,$id_course,$time_learn,$time_start,$time_end);
                // sau khi thêm hoàn thành sẽ điều hướng về trang read
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
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                // nếu k tồn tại id thì trả lại view read
                check_empty($id, CLASS_TEACHER);
                // nếu tồn tại thì nhận dữ liệu từ form
                $name_class     = $_POST['name_class'];
                $id_course      = $_POST['id_category'];
                $time_learn     = $_POST['time_learn'];
                $time_start     = $_POST['time_start'];
                $status_class   = $_POST['status_class'];
                // gọi fn chi tiết để kiểm tra dữ liệu
                $time_end       = date ( 'Y-m-d' , strtotime ( '+6 month' , strtotime ( $time_start ) ) );
                // Sau khi pass qua validate => Thực hiện update lên database
                class_update($name_class,$id_course,$time_learn,$time_start,$time_end,$status_class,$id);
                // update hoàn thành, điều hướng về trang danh sách
                location(CLASS_TEACHER);
                break;
            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                $update_class   = class_detail($id);
                check_id_teacher_login(getSession('user')['id'],$update_class['id_teacher'],CLASS_TEACHER);
                $courses_update = course_detail($id);
                check_id_teacher_login(getSession('user')['id'],$courses_update['id_teacherr'],CLASS_TEACHER);
                // nếu k tồn tại id thì trả lại view read
                check_empty($id, CLASS_TEACHER);
                // Khi pass qua validate => gọi model thực hiện delete
                class_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(CLASS_TEACHER);
                break;
            case "showStudent":
                // id lớp
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
                location($host . "page_not_found");
                break;
        }
    } else {
        if (isset($_GET['classes'])) {
            if (empty($_GET['classes'])) {
                location(CLASS_TEACHER);
            } else {
                $read_class = teacher_class_search($_GET['classes'],$id_teacher);
            }
        } else {
            $read_class = get_class_teacher($id_teacher);
        }
        include_once $direct_read;
    }
?>


