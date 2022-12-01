<?php
    function add_order($order_date,$order_pay){
        $sql = "INSERT INTO `orders`(`order_date`, `order_pay`) VALUES (?,?)";
        query_sql($sql,$order_date,$order_pay);
    }
    function add_orders($order_code,$order_date,$order_pay,$id_students,$id_class,$amount){
        $sql = "INSERT INTO `tbl_orders` 
                (
                 `order_code`,
                 `order_date`,
                 `order_pay`,
                 `id_students`,
                 `id_class`,
                 `amount`
                 ) 
                VALUES (?,?,?,?,?,?)";
        query_sql($sql,$order_code,$order_date,$order_pay,$id_students,$id_class,$amount);
    }
    function update_status_orders($status,$order_code){
        $sql = "UPDATE `tbl_orders` SET `status` = ? WHERE tbl_orders.order_code = ?";
        query_sql($sql,$status,$order_code);
    }
?>