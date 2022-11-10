<?php
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                $courses_read   = courses_read();
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
                check_empty($name_class,CLASSES . "/create");
                check_empty($id_course, CLASSES . "/create");
                check_empty($time_learn,CLASSES . "/create");
                check_empty($time_start,CLASSES . "/create");



                // Gọi model để thêm dữ liệu vào database
                class_create($name_class,$id_course,$time_learn,$time_start,$time_end);
                // sau khi thêm hoàn thành sẽ điều hướng về trang read
                location(CLASSES);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id, CLASSES);
                $update_class   = class_detail($id);
                $courses_read   = courses_read();
                $studentClass   = read_students_class($id);
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id, CLASSES);
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
                location(CLASSES);
                break;
            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id, CLASSES);
                // Khi pass qua validate => gọi model thực hiện delete
                class_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(CLASSES);
                break;
            case "addStudent":
                $id = $_GET['id'];
                check_empty($id,CLASSES);
                if(count_slot($id) == 3){
                    alert('Đã đủ sinh viên, Không thể thêm !',CLASSES);
                }
                $student_read  = read_student();
                include_once $direct_act;
                break;
            case "storeStudent":
                $id_class = $_GET['id'];
                $id_student = $_POST['id_student'];
                check_empty($id_student,CLASSES."/addStudent/".$id_class);
                add_student_to_class($id_student,$id_class);
                location(CLASSES);
                break;
            case "deleteStudent":
                $id_student = $_POST['id_student'];
                $id_class   = $_POST['id_class'];
                delete_student_class($id_student,$id_class);
                alert('Xóa thành công !',CLASSES.'/update/'.$id_class);
                break;
            default:
                location($host . "page_not_found");
                break;
        }
    } else {
        if (isset($_GET['classes'])) {
            if (empty($_GET['classes'])) {
                location(CLASSES);
            } else {
                $read_class = class_search($_GET['classes']);
            }
        } else {
            $read_class = class_read();
        }
        include_once $direct_read;
    }

?>


