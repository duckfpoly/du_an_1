<?php
    function order_read(){
        $sql = "SELECT 
                `tbl_orders`.*,
                students.name_student,
                students.email_student,
                students.phone_student,
                classes.name_class
            FROM `tbl_orders`
            INNER JOIN students ON `tbl_orders`.id_students = students.id
            INNER JOIN classes  ON `tbl_orders`.id_class = classes.id
            ORDER BY tbl_orders.status ASC
        ";
        return query($sql);
    }
    function orders_detail($id){
        $sql = "SELECT 
                    `tbl_orders`.*,
                    students.name_student,
                    students.email_student,
                    students.phone_student,
                    classes.name_class,
                    classes.id_course
                    FROM `tbl_orders`
                    INNER JOIN students ON `tbl_orders`.id_students = students.id
                    INNER JOIN classes  ON `tbl_orders`.id_class = classes.id
                    WHERE `tbl_orders`.id = ?
                ";
        return query_one($sql,$id);
    }
    function orders_search($key){
        $sql = "SELECT 
                `tbl_orders`.*,
                students.name_student,
                students.email_student,
                students.phone_student,
                classes.name_class,
                classes.id_course
                FROM `tbl_orders`
                INNER JOIN students ON `tbl_orders`.id_students = students.id
                INNER JOIN classes  ON `tbl_orders`.id_class = classes.id
                WHERE `tbl_orders`.order_code LIKE '%$key%'
            ";
        return query($sql);
    }
    function update_orders($status,$id){
        $sql ="UPDATE `tbl_orders` SET status = ? WHERE id = ?";
        query_sql($sql,$status,$id);
    }
    function order_delete($id){
        $sql = "DELETE FROM `tbl_orders` WHERE id = ?";
        query_sql($sql,$id);
    }
    function get_order($order_code){
        $sql = "SELECT * FROM `tbl_orders` WHERE order_code = ?";
        return query_one($sql,$order_code);
    }
    function order_filter($status){
        $sql = "SELECT 
                `tbl_orders`.*,
                students.name_student,
                students.email_student,
                students.phone_student,
                classes.name_class
                FROM `tbl_orders`
                INNER JOIN students ON `tbl_orders`.id_students = students.id
                INNER JOIN classes  ON `tbl_orders`.id_class = classes.id
                WHERE tbl_orders.status = ?
            ";
        return query($sql,$status);
    }
?>