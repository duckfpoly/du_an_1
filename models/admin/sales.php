<?php
    function read_sale(){
        $sql = "SELECT * FROM `sales`";
        return query($sql);
    }
    function create_sale($sale_code,$percent_discount,$time){
        $sql = "INSERT INTO `sales`(`sale_code`, `percent_discount`, `time`) VALUES (?,?,?)";
        query_sql($sql,$sale_code,$percent_discount,$time);
    }
    function update_sale($sale_code,$percent_discount,$time,$id){
        $sql = "UPDATE `sales` SET `sale_code`= ?,`percent_discount`= ?,`time`= ? WHERE id = ?";
        query_sql($sql,$sale_code,$percent_discount,$time,$id);
    }
    function delete_sale($id){
        $sql = "DELETE FROM `sales` WHERE id = ?";
        query_sql($sql,$id);
    }
    function detail_sale($id){
        $sql = "SELECT * FROM `sales` WHERE id = ?";
        return query_one($sql,$id);
    }
?>