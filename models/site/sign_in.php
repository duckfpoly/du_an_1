<?php
    function check_user($email,$pass){
        $sql = "SELECT * FROM students WHERE email_student = '$email' AND password_student = '$pass'";
        return query_one($sql);
    }

?>