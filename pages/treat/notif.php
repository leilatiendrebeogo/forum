<?php
if(isset($_POST['logout']) && !empty($_POST['logout'])){
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    echo 'connect.php';
}