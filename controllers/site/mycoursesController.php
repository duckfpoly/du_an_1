<?php
$id = $_SESSION['user']['id'];
$data = get_my_courses($id);

include 'views/site/mycourses/mycourses.php';
?>