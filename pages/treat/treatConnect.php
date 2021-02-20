<?php
// session_start();

// if(isset($_SESSION['username'],$_SESSION['role']) && $_SESSION['role']=='admin')
//   exit('admin.php');
// elseif(isset($_SESSION['username'],$_SESSION['role']) && $_SESSION['role']=='dev')
//   exit('dev.php');
// else
//   header('Location: '.dirname(__FILE__,1).'index.php');

require_once('../../config.php');
require_once('./DevsHandler.php');


if(!empty($_POST)){
    extract($_POST);
    
    if (count($_POST)==2) {
        if(isset($username,$mdp) && !empty($username) && !empty($mdp)){
            $dev=new DevHandler($bd=new DataBase(),$username,$mdp);
            echo $dev->connect();
        } else echo('wrong data');
            
    } elseif(count($_POST)==3){
        if(isset($username,$mdp,$email) && !empty($username) && !empty($mdp) && !empty($email)){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $dev=new DevHandler($bd=new DataBase(),$username,$mdp,$email);
                $dev->saveDev();
            } else 
                echo('unavalaible data');
        } else
            echo('unavalaible data');
    } elseif (count($_POST)==4) {
        if(!empty($username) && !empty($mdp) && !empty($mdp_confirm) && !empty($email)){
            if ($mdp_confirm!=$mdp)
                echo('unavalaible data');
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $dev=new DevHandler($bd=new DataBase(),$username,$mdp,$email);
                $dev->saveAdmin();
            } else 
                echo('unavalaible data');
        } else
            echo('unavalaible data');
    }
} else
    die('unavalaible data');