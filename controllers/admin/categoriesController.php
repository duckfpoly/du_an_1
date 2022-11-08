<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                // lấy dữ liệu từ form
                $name_category = $_POST['name_category'];
                // kiểm tra rỗng
                check_empty($name_category,CATEGORIES."/create");
                // Kiểm tra xem trong db tồn tại tên đó chưa
                check_data(check_name_category($name_category),CATEGORIES."/create");
                // Gọi model để thêm dữ liệu vào database
                category_create($name_category);
                // sau khi thêm hoàn thành sẽ điều hướng về trang read
                location(CATEGORIES);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id,CATEGORIES);
                $update_category = category_detail($id);
                include_once $direct_act;   
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,CATEGORIES);
                // nếu tồn tại thì nhận dữ liệu từ form
                $name_category = $_POST['name_category'];
                // gọi fn chi tiết để kiểm tra dữ liệu ( email, phone )
                $category_detail = category_detail($id);
                // Nếu dữ liệu update == dữ liệu trên database thì sẽ update bình thường
                // Nếu dữ liệu update != dữ liệu trên databse thì sẽ tiếp tục check ( k trùng thì update, ngược lại k update trả về 1 thông báo và về lại giao diện update )
                compare_data($name_category,$category_detail['name_category'],check_name_category($name_category),CATEGORIES.'/update/'.$id);
                // Sau khi pass qua validate => Thực hiện update lên database
                category_update($name_category,$id);
                // update hoàn thành, điều hướng về trang danh sách
                location(CATEGORIES);
                break;
            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,CATEGORIES);
                // Khi pass qua validate => gọi model thực hiện delete
                category_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(CATEGORIES);
                break;
            default:
                // khi nhập linh tinh thì sẽ điều hướng về trang 404
                location($host."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            if(empty($_GET['s'])){
                location(CATEGORIES);
            }else {
                $read_category = category_search($_GET['s']);
            }
        }else {
            $read_category = category_read();
        }
        include_once $direct_read;
    }
?>


