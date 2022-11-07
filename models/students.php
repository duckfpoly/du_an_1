<?php
    function count_student(){
        $sql = "SELECT COUNT(*) FROM students";
        return query_value($sql);
    }
?>