<?php
    session_start();
    function setSession($key, $val){
        $_SESSION[$key] = $val;
    }
    function getSession($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            location('http://localhost/courses/');
        }
    }
    function checkSessionAdmin(){
        if(getSession('scope') != 1){
            location('http://localhost/courses/login');
        }
    }
    function checkSessionTeacher(){
        getSession('user');
        if(getSession('user')['role'] != 0){
            location('http://localhost/courses/');
        }
    }
    function checkLogin(){
        if(getSession('scope') == 1){
            location('admin');
        }
    }
    function destroySession(){
        session_destroy();
    }
    function unsetSession($key){
        unset($_SESSION[$key]);
    }
?>