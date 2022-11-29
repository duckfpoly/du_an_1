<?php
    if(isset($_SESSION['user'])){
        $data_user = $_SESSION['user'];
    }
    include 'views/site/profile/profile.php';

?>