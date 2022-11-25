<?php
    $id_teacher = 2;
    if (isset($_GET['action'])) {
        $act = $_GET['action'];
        switch ($act) {
            case "create":
                if(count_category() == 0){
                    die(alert("Chưa có danh mục. Không thể tạo khóa học!",COURSE_TEACHER));
                }
                $category_read = category_read();
                include_once $direct_act;
                break;
            case "store":
                // lấy dữ liệu từ form
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $image_course           = $_FILES['image_course']['name'];
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $created_at             = date("Y-m-d H:i:s");
                $id_category            = $_POST['id_category'];
                $id_teacher             = $_POST['id_teacher'];
                // set đường dẫn
                $redirect = COURSE_TEACHER."/create";
                // hàm check_empty sẽ kiểm tra xem dữ liệu có rỗng không, nếu rỗng sẽ điều hướng về trang đã khai báo redirect bên trên
                check_empty($name_course            ,$redirect);
                check_empty($price_course           ,$redirect);
                check_empty($image_course           ,$redirect);
                check_empty($description_course     ,$redirect);
                check_empty($quote                  ,$redirect);
                check_empty($id_category            ,$redirect);
                check_empty($id_teacher             ,$redirect);
                check_data(check_name_course($name_course,$id_teacher),COURSE_TEACHER.'/create');
                // sau khi pass qua kiểm tra sẽ thực hiện insert vào db và lưu ảnh vào thư mục
                // lưu file ảnh, field: name input file ở form thêm, name_dir: là tên của mục đang làm
                save_file('image_course', 'courses');
                // Gọi model để thêm dữ liệu vào database
                courses_create($name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category,$id_teacher);
                // sau khi thêm hoàn thành sẽ điều hướng về trang read
                location(COURSE_TEACHER);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id,COURSE_TEACHER);
                $courses_update = course_detail($id);
                $category_read  = category_read();
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSE_TEACHER);
                // nếu tồn tại thì nhận dữ liệu từ form
                $status_course          = $_POST['status_course'];
                $name_course            = $_POST['name_course'];
                $price_course           = $_POST['price_course'];
                $description_course     = $_POST['description_course'];
                $quote                  = $_POST['quote'];
                $created_at             = $_POST['created_at'];
                $updated_at             = date("Y-m-d H:i:s");
                $id_category            = $_POST['id_category'];
                // gọi fn chi tiết để kiểm tra dữ liệu
                $course_detail          = course_detail($id);
                // kiểm tra ảnh
                // Nếu ảnh up lên giống ảnh gốc thì sẽ up lại ảnh cũ,ngược lại thì up ảnh mới và lưu vào thư mục
                $image_goc              = $course_detail['image_course'];
                $image_up               = $_FILES['image_course']['name'];
                if (empty($image_up)) {
                    $image_course = $image_goc;
                } else {
                    $image_course = $image_up;
                    save_file('image_course', 'courses');
                }
                // nếu tên đổi - gv k đổi
                if($name_course != $course_detail['name_course']){
                    check_data(check_name_course($name_course,$course_detail['id_teacher']),COURSES.'/update/'.$id);
                }
                // nếu tên k đổi - gv đổi
                elseif($id_teacher != $course_detail['id_teacher']){
                    check_data(check_name_course($name_course,$id_teacher),COURSES.'/update/'.$id);
                }
                // nếu tên vs id gv k đổi
                courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$updated_at,$id_category,$id_teacher,$id);
                location(COURSE_TEACHER);
                break;
            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSE_TEACHER);
                // Khi pass qua validate => gọi model thực hiện delete
                course_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(COURSE_TEACHER);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSE_TEACHER);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $courses_detail = course_detail($id);
                include_once $direct_act;
                break;
            default:
                // khi nhập linh tinh thì sẽ điều hướng về trang 404
                location($host."page_not_found");
                break;
        }
    } else {
        $teacher_read   = teacher_detail($id_teacher);
        if(isset($_GET['course'])){
            check_empty($_GET['course'],COURSE_TEACHER);
            $courses_read   = course_search($_GET['course']);
        }else {
            $courses_read   = get_course_teacher($id_teacher);
        }
        include_once $direct_read;
    }
?>


