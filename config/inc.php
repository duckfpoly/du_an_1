<?php
    $dir_config                 = 'config/';
    $dir_model                  = 'models/';
    $dir_model_admin            = $dir_model.'admin/';
    $dir_model_site             = $dir_model.'site/';
    $dir_model_manager          = $dir_model.'manager/';
    require_once $dir_config.'session.php';
    require_once $dir_config.'cookie.php';
    require_once $dir_config.'define.php';
    require_once $dir_config.'vnpay.php';
    require_once $dir_config.'ssp.class.php';
    // database
    require_once $dir_model.'process_db.php';
    // admin
    require_once $dir_model_admin.'accounts.php';
    require_once $dir_model_admin.'categories.php';
    require_once $dir_model_admin.'courses.php';
    require_once $dir_model_admin.'teachers.php';
    require_once $dir_model_admin.'students.php';
    require_once $dir_model_admin.'classes.php';
    require_once $dir_model_admin.'bills.php';
    require_once $dir_model_admin.'orders.php';
    require_once $dir_model_admin.'sales.php';
    require_once $dir_model_admin.'statistical.php';
    require_once $dir_model_admin.'rates.php';
    require_once $dir_model_admin.'notifications.php';
    // site
    require_once $dir_model_site.'receipt.php';
    require_once $dir_model_site.'categories.php';
    require_once $dir_model_site.'courses.php';
    require_once $dir_model_site.'payment.php';
    require_once $dir_model_site.'sign_in.php';
    require_once $dir_model_site.'sign_up.php';
    require_once $dir_model_site.'pass_handle.php';
    require_once $dir_model_site.'profile.php';
    //manager
    require_once $dir_model_manager.'teacher.php';
?>