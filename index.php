<?php
session_start();
require_once('config.php');

if(empty($_SESSION))
    $bd->existAdmin();
elseif($_SESSION['role']=='admin')
    header('Location: pages/admin.php');
elseif($_SESSION['role']=='dev')
    header('Location: pages/dev.php');