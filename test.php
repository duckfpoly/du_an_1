<?php
    $date = "2022-11-03 12:56:00";
//    $date = date ( 'Y-m-d');
    $time_end = strtotime ( '-1 year' , strtotime ( $date ) ) ;
    $time_end = date ( 'Y-m-d' , $time_end );
    echo $time_end;
?>