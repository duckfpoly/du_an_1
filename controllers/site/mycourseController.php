<?php
    $idUser = $_SESSION['user']['id'];
    $idCourse = $_GET['id'];
    $course = detail_mycourse($idUser, $idCourse);
    include 'views/site/mycourses/mycourse.php';

?>