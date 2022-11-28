<?php 
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                $order_date           = $_POST['order_date'];
                $order_pay          = $_POST['order_pay'];

                $redirect = BILLS."/create";
                //kiem tra rong
                check_empty($order_date       ,$redirect);
                check_empty($order_pay      ,$redirect);

                location(BILLS);
                break;
            case "update":
                $id = $_GET["id"];
                check_empty($id,BILLS);
                $bill_detail = bill_detail($id);
                include_once $direct_act;
                break;
            case "edit":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,BILLS);
                // nếu tồn tại thì nhận dữ liệu từ form
                $status               = $_POST['status'];
                // gọi fn chi tiết để kiểm tra dữ liệu ( email, phone )
                $bill_detail         = bill_detail($id);
                // Sau khi pass qua validate => Thực hiện update lên database
                bill_update($status,$id);
                // update hoàn thành, điều hướng về trang danh sách
                location(BILLS);
                break;

            case "destroy":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,BILLS);
                // Khi pass qua validate => gọi model thực hiện delete
                bill_delete($id);
                // delete hoàn thành, điều hướng về trang danh sách
                location(BILLS);
                break;
            case "detail":
                // Lấy id từ trên url và kiểm tra
                $id = $_GET['id'];
                // nếu k tồn tại id thì trả lại view read
                check_empty($id,BILLS);
                // Nếu tồn tại thì gọi model chi tiết để lấy thông tin và trả về giao diện chi tiết
                $bill_detail = bill_detail($id);
                include_once $direct_act;
                break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
        if(isset($_GET['s'])){
            check_empty($_GET['s'],BILLS);
            $read_bill   = bill_search($_GET['s']);
            
        }else {
            $all_data = read_bill();
        }
        include_once $direct_read;
    }
?>
