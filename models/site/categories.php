<?php
    function get_all_categories(){
        $sql = "SELECT * FROM categories";
        return query($sql);
    }



?>