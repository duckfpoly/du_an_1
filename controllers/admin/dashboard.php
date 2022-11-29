<?php
    $count_categories   = count_category();
    $read_categories    = category_read();
    $count_courses      = course_count();
    $count_teachers     = count_teacher();
    $count_students     = count_student();
    $code_sale          = read_sale();
    include_once 'views/admin/dashboard.php';
?>
