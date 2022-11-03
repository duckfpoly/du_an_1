<?php 
    function courses_read(){
        $sql = "Select * from courses";
        $read = (new process())->query($sql);
        return $read;
    }
?>