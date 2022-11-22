<?php
    function checkEmail ($email){
        $sql = "SELECT * FROM students WHERE email_student = '$email'";
        return query_one($sql);
    }
    function addUser($name, $email, $pass, $date){
        $sql = "INSERT INTO students(name_student, email_student, password_student, created_at) VALUES
        ('$name','$email','$pass','$date')";
        query_sql($sql);
    }
?>