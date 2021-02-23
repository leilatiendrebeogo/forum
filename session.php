<?php
session_start();
if(count($_SESSION)==0)
    header('Location: connect.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='admin')
    header('Location: admin.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='dev')
    header('Location: dev.php');