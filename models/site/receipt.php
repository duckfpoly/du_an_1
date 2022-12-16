<?php
    function get_receipt($id){
        $sql = "SELECT * FROM order_detail INNER JOIN orders ON order_detail.id_order = orders.id
            INNER JOIN courses ON order_detail.id_course = courses.id INNER JOIN classes 
            ON courses.id = classes.id_course INNER JOIN teachers ON classes.id_teacher = teachers.id
            WHERE order_detail.id_students = $id
        ";
        return query_one($sql);
    }

?>