<?php
    require_once '../../config/session.php';
    unsetSession('scope');
    echo '<script>window.location="login";</script>';
?>

