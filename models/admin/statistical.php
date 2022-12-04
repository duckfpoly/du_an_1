<?php
    // hóa đơn
    function filter_order_time($date_start,$date_end){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE order_date BETWEEN ? AND ? ";
        return query_value($sql,$date_start,$date_end);
    }
    function pay_filter_order_time($stt,$date_start,$date_end){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE status = ? AND order_date BETWEEN ? AND ?";
        return query_value($sql,$stt,$date_start,$date_end);
    }
    function turn_over(){
        $sql = "SELECT SUM(amount) FROM tbl_orders ";
        return query_value($sql);
    }
    function month($cal){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE MONTH(order_date) = ?";
        return query_value($sql,$cal);
    }
    function year($cal){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE YEAR(order_date) = ?";
        return query_value($sql,$cal);
    }
    function pay($stt){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE status = ?";
        return query_value($sql,$stt);
    }
    function pay_filter_month($stt,$cal){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE status = ? AND MONTH(order_date) = ? ";
        return query_value($sql,$stt,$cal);
    }
    function pay_filter_year($stt,$cal){
        $sql = "SELECT SUM(amount) FROM tbl_orders WHERE status = ? AND YEAR(order_date) = ?";
        return query_value($sql,$stt,$cal);
    }
    // học viên
    function filter_std_time($date_start,$date_end){
        $sql = "SELECT COUNT(*) FROM students WHERE created_at BETWEEN ? AND ?";
        return query_value($sql,$date_start,$date_end);
    }
    function filter_std_time_join_class($stt,$date_start,$date_end){
        $sql = "SELECT COUNT(id_students) FROM tbl_orders 
                INNER JOIN students ON tbl_orders.id_students = students.id 
                WHERE tbl_orders.status = ? AND students.created_at BETWEEN ? AND ?
        ";
        return query_value($sql,$stt,$date_start,$date_end);
    }
    function total_std(){
        $sql = "SELECT COUNT(*) FROM students";
        return query_value($sql);
    }
    function join_class($stt){
        $sql = "SELECT COUNT(id_students) FROM tbl_orders WHERE tbl_orders.status = ? ";
        return query_value($sql,$stt);
    }
    function std_month($cal){
        $sql = "SELECT COUNT(*) FROM students WHERE MONTH(created_at) = ?";
        return query_value($sql,$cal);
    }
    function std_year($cal){
        $sql = "SELECT COUNT(*) FROM students WHERE YEAR(created_at) = ?";
        return query_value($sql,$cal);
    }
    function join_class_month($stt,$cal){
        $sql = "SELECT COUNT(id_students) FROM tbl_orders WHERE status = ? AND MONTH(order_date) = ? ";
        return query_value($sql,$stt,$cal);
    }
    function join_class_year($stt,$cal){
        $sql = "SELECT COUNT(id_students) FROM tbl_orders WHERE status = ? AND YEAR(order_date) = ?";
        return query_value($sql,$stt,$cal);
    }

    function statistical_count_courses(){
        $sql = "SELECT COUNT(*) FROM courses";
        return query_value($sql);
    }

    function statistical_courses_status($status){
        $sql = "SELECT COUNT(*) FROM courses WHERE status_course = ? ";
        return query_value($sql,$status);
    }


    function count_pay_with_month($month,$year){
        $sql = "SELECT SUM(amount) AS total 
                FROM tbl_orders 
                WHERE MONTH(order_date) = ?
                AND status = 2
                AND YEAR(order_date) = $year
                ";
        return query_value($sql,$month);
    }

    function count_pay_now_year(){
        $date = getdate();
        $year = $date['year'];
        $sql = "SELECT COUNT(YEAR(order_date)) FROM tbl_orders WHERE YEAR(order_date) = $year AND status = 2";
        return query_value($sql);
    }
    function count_pay_old_year(){
        $date = getdate();
        $year = $date['year'] - 1;
        $sql = "SELECT COUNT(YEAR(order_date)) FROM tbl_orders WHERE YEAR(order_date) = $year AND status = 2";
        return query_value($sql);
    }


?>