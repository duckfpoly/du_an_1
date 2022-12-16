<?php
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case "create":
                include_once $direct_act;
                break;
            case "store":
                $sale_code          = $_POST['sale_code'];
                $percent_discount   = $_POST['percent'];
                $time               = $_POST['time'];
                check_empty($sale_code,             SALES."/create");
                check_empty($percent_discount,      SALES."/create");
                check_empty($time,                  SALES."/create");
                check_data(check_name_category($sale_code),SALES."/create");
                create_sale(($sale_code.$percent_discount),$percent_discount,$time);
                location(SALES);
                break;
            case "update":
                $id = $_GET['id'];
                check_empty($id,SALES);
                $update_sale = detail_sale($id);
                include_once $direct_act;
                break;
            case "edit":
                $id                 = $_POST['id_sale'];
                $sale_code          = $_POST['sale_code'];
                $percent_discount   = $_POST['percent'];
                $time               = $_POST['time'];
                $cut                = substr($sale_code, 0, -2);
                update_sale(($cut.$percent_discount),$percent_discount,$time,$id);
                location(SALES);
                break;
            case "destroy":
                die(location(SALES));
                $id = $_POST['id_sale'];
                check_empty($id,SALES);
                delete_sale($id);
                alert('Xóa thành công !',SALES);
                break;
            default:
                location(BASE_URL."page_not_found");
                break;
        }
    }else {
//        $read_sale = read_sale();
        if(isset($_GET['s'])){
            if(empty($_GET['s'])){
                location(SALES);
            }else {
                $data_cate = pagination_search('sales','sale_code',$_GET['s'],5);
                $read_sale = $data_cate[0];
            }
        }else {
            $data_cate = pagination_normal('sales',5);
            $read_sale = $data_cate[0];
        }
        include_once $direct_read;
    }
?>



