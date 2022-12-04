<?php
    unsetSession('user');
    location($_SERVER['HTTP_REFERER']);
?>