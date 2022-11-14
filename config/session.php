<?php
    session_start();
    function setSession($key, $val){
        $_SESSION[$key] = $val;
    }
    function getSession($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    function checkSessionAdmin(){
        if(getSession('scope') != 1){
            location('login');
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