<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                if(count_category() == 0){
                    die(alert("Chưa có danh mục. Không thể tạo khóa học!",COURSES));
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
                $redirect = COURSES."/create";
                check_empty($name_course            ,$redirect);
                check_empty($price_course           ,$redirect);
                check_empty($image_course           ,$redirect);
                check_empty($description_course     ,$redirect);
                check_empty($quote                  ,$redirect);
                check_empty($id_category            ,$redirect);
                $saveImg = saveImage('image_course','courses');
                isset($saveImg) && show_error($saveImg,$redirect);
                courses_create($name_course,$price_course,$image_course,$description_course,$quote,$created_at,$id_category);
                location(COURSES);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id,COURSES);
                $courses_update = course_detail($id);
                $category_read  = category_read();
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSES);
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
//                    save_file('image_course', 'courses');
                    $saveImg = saveImage('image_course','courses');
                    isset($saveImg) && show_error($saveImg,COURSES.'/update/'.$id);
                }
                courses_update($name_course,$price_course,$image_course,$status_course,$description_course,$quote,$created_at,$updated_at,$id_category,$id);
                location(COURSES);
                break;
            case "destroy":
                die(location(COURSES));
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSES);
                // Khi pass qua validate => gọi model thực hiện delete
                course_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(COURSES);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,COURSES);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $courses_detail = course_detail($id);
                include_once $direct_act;
                break;
            default:
                // khi nhập linh tinh thì sẽ điều hướng về trang 404
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['course'])){
            check_empty($_GET['course'],COURSES);
            $courses_read   = course_search($_GET['course']);
        }
        elseif (isset($_GET['category'])){
            $id = $_GET['category'];
            empty($id) && location(COURSES);
            check_id_category($id) !== null && location(COURSES);
            $courses_read   = courses_read_with_cate($id);
        }
        else {
            $courses_read   = courses_read();
        }
        $category_read  = category_read();
        include_once $direct_read;
    }
?>



