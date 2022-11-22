<?php
    include 'global.php';
    if(isset($_SESSION['user'])){
        header($host);
    }
    include 'routes/route_account.php';
    
?>