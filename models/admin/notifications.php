<?php
    function notification_create($title,$body,$time){
        $sql = "INSERT INTO `notification_admin`(`title`, `body`, `time`) VALUES (?,?,?)";
        query_sql($sql,$title,$body,$time);
    }
?>