<?php
define("ROOTcss","http://localhost/Forum/css/");
$bd=new PDO("mysql:hostname=localhost;dbname=forum;charset=utf8","root","");
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>