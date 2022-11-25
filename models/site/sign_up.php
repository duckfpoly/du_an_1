<?php
    function checkEmail ($email){
        $sql = "SELECT * FROM students WHERE email_student = '$email'";
        return query_one($sql);
    }
    function addUser($name, $email, $pass, $date){
        $sql = "INSERT INTO students(name_student, email_student, password_student, created_at,image_student) VALUES
        ('$name','$email','$pass','$date','avatar.png')";
        query_sql($sql);
    }
?>