<?php
    function get_new_courses(){
        $sql = "SELECT * FROM courses ORDER BY id DESC LIMIT 5";
        return query($sql);
    }

    function get_all_courses(){
        $sql = "SELECT * FROM courses";
        return query($sql);
    }

?>