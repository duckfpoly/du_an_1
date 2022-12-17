<?php
    function notification_create($title,$body,$time,$url){
        $sql = "INSERT INTO `notification_admin`(`title`, `body`, `time`, `url`) VALUES (?,?,?,?)";
        query_sql($sql,$title,$body,$time,$url);
    }
?>