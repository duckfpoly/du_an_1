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
            location( BASE_URL.'login');
        }
    }
    function checkSessionTeacher(){
        if(getSession('user')){
            if(getSession('user')['role'] != 0){
                location( HOME );
            }
        }else { 
            location( HOME );
        }
    }
    function checkLogin(){
        if(getSession('scope') == 1){
            location(DASHBOARD);
        }
    }
    function destroySession(){
        session_destroy();
    }
    function unsetSession($key){
        unset($_SESSION[$key]);
    }
?>