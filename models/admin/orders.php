<?php
    function check_order_code($order_code){
        $sql = "SELECT * FROM `tbl_orders` WHERE order_code = ?";
        if(query_one($sql, $order_code) > 0 ){
            return "Tên danh mục đã được sử dụng!";
        }
    }

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

    function countclasscourse($id_course){
        $sql = "SELECT COUNT(*) FROM classes WHERE id_course = ?";
        return query_value($sql,$id_course);
    }

    function check_order_course($id_course,$id_student){
        $sql = "SELECT COUNT(*) FROM tbl_orders 
                INNER JOIN classes ON tbl_orders.id_class = classes.id
                WHERE classes.id_course = ?
                AND tbl_orders.status = 0
                AND tbl_orders.id_students = ? 
                ";
        if(query_value($sql,$id_course,$id_student) > 0){
            return 'Đơn đăng ký khóa học này của bạn đang chờ thanh toán.
             Vui lòng thanh toán để có thể vào lớp học !';
        }
    }

    function update_status_order(){
        $sql = "SELECT * FROM tbl_orders WHERE status = 0";
        $data = query($sql);
        foreach ($data as $items => $values){
            $time_order = strtotime ( '+24 hours' , strtotime ( $values['order_date'] ) ) ;
            $time_now = strtotime(date('Y-m-d H:i:s'));
            if($time_now > $time_order) {
                $sql = "UPDATE `tbl_orders` SET `status` = 1 WHERE id = ?";
                query_sql($sql,$values['id']);
                $sql = "DELETE FROM `detail_classes` WHERE `id_students` = ? AND id_class = ?";
                query_sql($sql,$values['id_students'],$values['id_class']);
            }
        }
    }


    function student_order($id_student){
        $sql = "SELECT * FROM tbl_orders WHERE id_students = ?";
        return query_sql($sql,$id_student);
    }

?>

