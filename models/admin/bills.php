<?php
    function bill_delete($id){
        $sql = "DELETE FROM orders WHERE id = ?";
        query_sql($sql,$id);
    }
    function bill_detail($id){
        $sql = "SELECT *  FROM orders WHERE id = ?";
        return query_one($sql,$id);
    }
    function bill_search($key){
        $sql = "SELECT * FROM orders WHERE order_pay LIKE '%$key%'";
        return query($sql);
    }
    function count_bill(){
    $sql = "SELECT COUNT(*) FROM orders";
    return query_value($sql);
    }
    function bill_update($status,$id){
        $sql = "UPDATE `orders` SET `status` = ? WHERE id = ? ";
        query_sql($sql,$status,$id);
    }
    function bill_read(){
        $sql = "SELECT * FROM `orders` ORDER BY id DESC";
        return query($sql);
    }
    function check_id_bill($id){
        $sql = "SELECT * FROM `orders` WHERE id = ?";
        $check_ID = query_one($sql, $id);
        if(!isset($check_ID['id'])) {
            return 'Hoá đơn không tồn tại !';
        } 
    }
    function read_bill(){
        $sql = "SELECT *, orders.id as id_dh FROM orders INNER JOIN order_detail ON orders.id = order_detail.id_order 
        INNER JOIN courses ON order_detail.id_course = courses.id 
        INNER JOIN students ON order_detail.id_students = students.id";
        return query($sql);
    }
?>