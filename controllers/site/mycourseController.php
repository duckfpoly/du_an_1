<?php
    $idUser = $_SESSION['user']['id'];
    $idCourse = $_GET['id'];
    $course = detail_mycourse($idUser, $idCourse);
    var_dump($course);
    include 'views/site/mycourses/mycourse.php'

?>