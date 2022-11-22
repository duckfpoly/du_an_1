<?php
    include 'global.php';
    if(isset($_SESSION['user'])){
        location($host);
    }
    include 'routes/route_account.php';
    
?>