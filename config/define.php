<?php
        define("BASE_URL",     'http://localhost/courses/');
//    define("BASE_URL",     'http://localhost/coursesWeb/du_an_1/');
//    define("BASE_URL",     'http://localhost/hangdtph27628/du_an_1/');
    define("URI",     $_SERVER['REQUEST_URI']);
    // database
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "db_test");
    // url admin
    define("ADMIN",                 BASE_URL.'admin/');
    define("DASHBOARD",             BASE_URL.'admin');
    define("CATEGORIES",            ADMIN.'categories');
    define("COURSES",               ADMIN.'courses');
    define("TEACHERS",              ADMIN.'teachers');
    define("STUDENTS",              ADMIN.'students');
    define("BILLS",                 ADMIN.'bills');
    define("ORDERS",                ADMIN.'orders');
    define("RATES",                 ADMIN.'rates');
    define("CLASSES",               ADMIN.'classes');
    define("SALES",                 ADMIN.'sales');
    define("SIGNOUT",               ADMIN.'logout');
    define("STATISTICAL",           ADMIN.'statistical');
    // url site
    define("HOME",                  BASE_URL);
    define("LESSONS",               BASE_URL.'lessons');
    define("MYCOURSES",             BASE_URL.'mycourses');
    define("PROFILE",               BASE_URL.'profile');
    define("CHANGE_PASS",           BASE_URL.'change_pass');
    define("MYCOURSE",              BASE_URL.'mycourse');
    define("ABOUT",                 BASE_URL.'about');
    define("CONTACT",               BASE_URL.'contact');
    define("PAYMENT",               BASE_URL.'payment');
    define("SIGUP",                 BASE_URL.'account/sign_up');
    define("SIGIN",                 BASE_URL.'account/sign_in');
    define("LOGOUT",                BASE_URL.'account/log_out');
    define("FORGOT_PASS",           BASE_URL.'account/forgot_pass');
    define("RESET_PASS",            BASE_URL.'account/reset_pass');
    define("TEACHER_SIGNIN",        BASE_URL.'account/teacher_signin');
    define("RECEIPT",               BASE_URL.'receipt');
    // teacher manager
    define("DASHBOARD_TEACHER",     BASE_URL.'teacher_manager');
    define("CLASSARCHIVE_TEACHER",  BASE_URL.'teacher_manager/my_class_archive');
    define("CLASS_TEACHER",         BASE_URL.'teacher_manager/my_class');
    define("TEACHER_PROFILE",       BASE_URL.'teacher_manager/teacher_profile');
?>