<?php
// session_start();



define("ROOTcss","http://localhost/Forum/css/");
$bd=new PDO("mysql:hostname=localhost;dbname=forum;charset=utf8","root","");
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

function existAdmin($bd){

    $req=$bd->query('SELECT COUNT(*) as role FROM devs WHERE role="admin"');
    $nb_admin=$req->fetch(PDO::FETCH_ASSOC);
    if($nb_admin['role']==0)
        header('Location: pages/inscript.php');
    else
        header('Location: pages/connect.php');
}

?>