<?php
    function set_Cookie($name, $value, $day){
        setcookie($name, $value, time() + (86400 * $day), "/");
    }
    function delete_Cookie($name){
        set_Cookie($name, '', -1);
    }
    function get_Cookie($name){
        if (isset($_COOKIE[$name])) {
            return $_COOKIE[$name];
        } else {
            return false;
        }
    }
    function checkScopeAdmin(){
        if(get_Cookie('scope') != 1){
            location('login');
        }
    }
?>