<?php
    function format_image_base64($name_image){
        $host = 'http://localhost/courses/';
        $path = $host.'assets/uploads/courses/'.$name_image;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    echo format_image_base64('course_4.jpg');
?>