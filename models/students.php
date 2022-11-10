<?php
    function read_student(){
        $sql = "SELECT * FROM students";
        return query($sql);
    }
    function count_student(){
        $sql = "SELECT COUNT(*) FROM students";
        return query_value($sql);
    }
?>