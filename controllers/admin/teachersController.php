<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                // lấy dữ liệu từ form
                $name_teacher           = $_POST['name_teacher'];
                $email_teacher          = $_POST['email_teacher'];
                $phone_teacher          = $_POST['phone_teacher'];
                $password_teacher       = $_POST['password_teacher'];
                $image_teacher          = $_FILES['image_teacher']['name'];
                $about_teacher          = $_POST['about_teacher'];
                $scope_teacher          = $_POST['scope_teacher'];
                $created_at             = date("Y-m-d H:i:s");
                // set đường dẫn ( trang thêm gv )
                $redirect = TEACHERS."/create";
                // hàm check_empty sẽ kiểm tra xem dữ liệu có rỗng không, nếu rỗng sẽ điều hướng về trang đã khai báo redirect bên trên
                check_empty($name_teacher       ,$redirect);
                check_empty($email_teacher      ,$redirect);
                check_empty($phone_teacher      ,$redirect);
                check_empty($password_teacher   ,$redirect);
                check_empty($image_teacher      ,$redirect);
                check_empty($about_teacher      ,$redirect);
                check_empty($scope_teacher      ,$redirect);
                // Kiểm tra xem trong db tồn tại email | phone chưa
                check_data(check_email_teacher($email_teacher),$redirect);
                check_data(check_phone_teacher($phone_teacher),$redirect);
                // sau khi pass qua kiểm tra sẽ thực hiện insert vào db và lưu ảnh vào thư mục
                // lưu file ảnh, field: name input file ở form thêm, name_dir: là tên của danh mục đang làm ( đang làm là teachers thì name_dir sẽ là teachers )
//                save_file('image_teacher', 'teachers');
                $saveImg = saveImage('image_teacher','teachers');
                isset($saveImg) && show_error($saveImg,TEACHERS.'/create');
                // Gọi model để thêm dữ liệu vào database
                teachers_create($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at);
                // sau khi thêm hoàn thành sẽ điều hướng về trang read
                location(TEACHERS);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id,TEACHERS);
                $teacher_detail = teacher_detail($id);
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,TEACHERS);
                // nếu tồn tại thì nhận dữ liệu từ form
                $name_teacher           = $_POST['name_teacher'];
                $email_teacher          = $_POST['email_teacher'];
                $phone_teacher          = $_POST['phone_teacher'];
                $password_teacher       = $_POST['password_teacher'];
                $about_teacher          = $_POST['about_teacher'];
                $scope_teacher          = $_POST['scope_teacher'];
                $created_at             = $_POST['created_at'];
                $updated_at             = date("Y-m-d H:i:s");
                $status_teacher         = $_POST['status_teacher'];
                // gọi fn chi tiết để kiểm tra dữ liệu ( email, phone )
                $teacher_detail         = teacher_detail($id);
                // kiểm tra ảnh
                // Nếu ảnh up lên giống ảnh gốc thì sẽ up lại ảnh cũ,ngược lại thì up ảnh mới và lưu vào thư mục
                $image_goc              = $teacher_detail['image_teacher'];
                $image_up               = $_FILES['image_teacher']['name'];
                if (empty($image_up)) {
                    $image_teacher = $image_goc;
                } else {
                    $image_teacher = $image_up;
//                    save_file('image_teacher', 'teachers');
                    $saveImg = saveImage('image_teacher','teachers');
                    isset($saveImg) && show_error($saveImg,TEACHERS.'/update/'.$id);
                }
                // Nếu dữ liệu update == dữ liệu trên database thì sẽ update bình thường
                // Nếu dữ liệu update != dữ liệu trên databse thì sẽ tiếp tục check ( k trùng thì update, ngược lại k update trả về 1 thông báo và về lại giao diện update )
                compare_data($email_teacher,$teacher_detail['email_teacher'],check_email_teacher($email_teacher),TEACHERS.'/update/'.$id);
                compare_data($phone_teacher,$teacher_detail['phone_teacher'],check_phone_teacher($phone_teacher),TEACHERS.'/update/'.$id);
                // Sau khi pass qua validate => Thực hiện update lên database
                teachers_update($name_teacher,$email_teacher,$phone_teacher,$password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at,$updated_at,$status_teacher,$id);
                // update hoàn thành, điều hướng về trang danh sách
                location(TEACHERS);
                break;
            case "destroy":
                die(location(TEACHERS));
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,TEACHERS);
                // Khi pass qua validate => gọi model thực hiện delete
                teacher_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(TEACHERS);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,TEACHERS);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $teacher_detail = teacher_detail($id);
                include_once $direct_act;
                break;
            default:
                // khi nhập linh tinh thì sẽ điều hướng về trang 404
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            check_empty($_GET['s'],TEACHERS);
            $read_teacher   = teacher_search($_GET['s']);
        }else {
            $read_teacher   = teacher_read();
        }
        include_once $direct_read;
    }
?>



