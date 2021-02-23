<?php
session_start();
if(count($_SESSION)==0){
    require_once('config.php');
    $bd->existAdmin();
}elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='admin')
    header('Location: pages/admin.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='dev')
    header('Location: pages/dev.php');