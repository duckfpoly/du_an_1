<?php
    $date   = getdate();
    $year   = $date['year'];
    $month  = $date['mon'];

    if(isset($_GET['date_start']) && isset($_GET['date_end'])){
        $date_start = $_GET['date_start'];
        $date_end   = $_GET['date_end'];
        $turn_over              =   return_empty_data(filter_order_time($date_start,$date_end));
        $actually_received      =   return_empty_data(pay_filter_order_time(2,$date_start,$date_end));
        $unpaids                =   return_empty_data(pay_filter_order_time(0,$date_start,$date_end));
        $des_pay                =   return_empty_data(pay_filter_order_time(1,$date_start,$date_end));

        $total_std              =   return_empty_data(filter_std_time($date_start,$date_end));
        $join_class             =   return_empty_data(filter_std_time_join_class(2,$date_start,$date_end));
        $wait_join              =   return_empty_data(filter_std_time_join_class(0,$date_start,$date_end));
        $no_join                =   return_empty_data(filter_std_time_join_class(1,$date_start,$date_end));
    }
    else {
        if(isset($_GET['filter_pay'])){
            if($_GET['filter_pay'] == ''){
                location(STATISTICAL);
            }
            if ($_GET['filter_pay'] == 0){
                $turn_over              =   return_empty_data(month($month));
                $actually_received      =   return_empty_data(pay_filter_month(2,$month));
                $unpaids                =   return_empty_data(pay_filter_month(0,$month));
                $des_pay                =   return_empty_data(pay_filter_month(1,$month));
            }
            elseif ($_GET['filter_pay'] == 1){
                $turn_over              =   return_empty_data(month($month - 1));
                $actually_received      =   return_empty_data(pay_filter_month(2,$month - 1));
                $unpaids                =   return_empty_data(pay_filter_month(0,$month - 1));
                $des_pay                =   return_empty_data(pay_filter_month(1,$month - 1));
            }
            elseif ($_GET['filter_pay'] == 2){
                $turn_over              =   return_empty_data(year($year - 1));
                $actually_received      =   return_empty_data(pay_filter_year(2,$year - 1));
                $unpaids                =   return_empty_data(pay_filter_year(0,$year - 1));
                $des_pay                =   return_empty_data(pay_filter_year(1,$year - 1));


            }
            else {
                location(STATISTICAL);
            }
        }
        else {
            // orders
            $turn_over              =   return_empty_data(turn_over());
            $actually_received      =   return_empty_data(pay(2));
            $unpaids                =   return_empty_data(pay(0));
            $des_pay                =   return_empty_data(pay(1));
        }

        if(isset($_GET['filter_std'])){
            if ($_GET['filter_std'] == 0){
                $total_std              =   return_empty_data(std_month($month));
                $join_class             =   return_empty_data(join_class_month(2,$month));
                $wait_join              =   return_empty_data(join_class_month(0,$month));
                $no_join                =   return_empty_data(join_class_month(1,$month));
            }
            elseif ($_GET['filter_std'] == 1){
                $total_std              =   return_empty_data(std_month($month - 1));
                $join_class             =   return_empty_data(join_class_month(2,$month - 1));
                $wait_join              =   return_empty_data(join_class_month(0,$month - 1));
                $no_join                =   return_empty_data(join_class_month(1,$month - 1));
            }
            elseif ($_GET['filter_std'] == 2){
                $total_std              =   return_empty_data(std_year($year - 1));
                $join_class             =   return_empty_data(join_class_year(2,$year - 1));
                $wait_join              =   return_empty_data(join_class_year(0,$year - 1));
                $no_join                =   return_empty_data(join_class_year(1,$year - 1));
            }
            else {
                location(STATISTICAL);
            }
        }
        else {
            // students
            $total_std              =   return_empty_data(total_std());
            $join_class             =   return_empty_data(join_class(2));
            $wait_join              =   return_empty_data(join_class(0));
            $no_join                =   return_empty_data(join_class(1));
        }
    }

    $count_course       = statistical_count_courses();
    $count_course_open  = statistical_courses_status(0);
    $count_course_close = statistical_courses_status(1);



    include_once $direct_read;
?>