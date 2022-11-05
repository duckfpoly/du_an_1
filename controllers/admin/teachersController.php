<?php
$act = isset($_GET['act']) ? $_GET['act'] : "";
switch ($act) {
    case "create":
        include_once 'views/admin/'.$module.'/create.php';
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
        // đường dẫn ( trang thêm gv )
        $redirect = TEACHERS."/create";
        // hàm check_empty sẽ kiểm tra xem dữ liệu rỗng không, nếu rỗng sẽ điều hướng về trang đã khai báo redirect bên trên
        check_empty($name_teacher       ,$redirect);
        check_empty($email_teacher      ,$redirect);
        check_empty($phone_teacher      ,$redirect);
        check_empty($password_teacher   ,$redirect);
        check_empty($image_teacher      ,$redirect);
        check_empty($about_teacher      ,$redirect);
        check_empty($scope_teacher      ,$redirect);
        // sau khi pass qua kiểm tra sẽ thực hiện insert vào db và lưu ảnh vào thư mục
        // lưu file ảnh, field: name input ở form thêm, name_dir: là tên của mục đang làm ( đang làm là teachers nên name_dir sẽ là teachers )
        save_file('image_teacher', 'teachers');
        // Gọi models để thêm dữ liệu vào database
        teachers_create($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at);
        // sau khi thêm hoàn thành sẽ điều hướng về trang read
        location(TEACHERS);
        break;
    case "update":
        $id = $_GET['id'];
        check_empty($id,TEACHERS);
        $teacher_detail = teacher_detail($id);
        include_once 'views/admin/'.$module.'/update.php';
        break;
    case "edit":
        $id = $_GET['id'];
        check_empty($id,TEACHERS);
        $name_teacher           = $_POST['name_teacher'];
        $email_teacher          = $_POST['email_teacher'];
        $phone_teacher          = $_POST['phone_teacher'];
        $password_teacher       = $_POST['password_teacher'];
        $image_goc              = $_POST['old_image_teacher'];
        $image_up               = $_FILES['image_teacher']['name'];
        if ($image_up == '') {
            $image_teacher = $image_goc;
        } else {
            $image_teacher = $image_up;
            save_file('image_teacher', 'teachers');
        }
        $about_teacher          = $_POST['about_teacher'];
        $scope_teacher          = $_POST['scope_teacher'];
        $created_at             = $_POST['created_at'];
        $updated_at             = date("Y-m-d H:i:s");
        $status_teacher         = $_POST['status_teacher'];
        teachers_update($name_teacher,$email_teacher,$phone_teacher, $password_teacher,$image_teacher,$about_teacher,$scope_teacher,$created_at,$updated_at,$status_teacher,$id);
        location(TEACHERS);
        break;
    case "destroy":
        $id = $_GET['id'];
        check_empty($id,TEACHERS);
        teacher_delete($id);
        location(TEACHERS);
        break;
    case "detail":
        $id = $_GET['id'];
        check_empty($id,TEACHERS);
        $teacher_detail = teacher_detail($id);
        include_once 'views/admin/'.$module.'/detail.php';
        break;
    default:
        $read_teacher = teacher_read();
        include_once 'views/admin/'.$module.'/read.php';
        break;
}
?>
