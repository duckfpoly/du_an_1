<?php
    function get_receipt($id){
        $sql = "SELECT * FROM tbl_orders INNER JOIN classes 
            ON tbl_orders.id_class = classes.id INNER JOIN teachers 
            ON classes.id_teacher = teachers.id INNER JOIN courses ON classes.id_course = courses.id
            WHERE tbl_orders.id_students = $id AND tbl_orders.status = 2
        ";
        return query_one($sql);
    }

?>