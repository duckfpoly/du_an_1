<?php
    function add_order($date,$order_pay){
        $sql = 'INSERT INTO orders(order_date, order_pay) VALUES ('$date','$order_pay')';
        query_sql($sql);
    }

?>