<?php
session_start();

require_once('../../config.php');
require_once('./DevsHandler.php');


if(!empty($_POST)){
    extract($_POST);
    
    if (count($_POST)==2) {
        if(isset($username,$mdp) && !empty($username) && !empty($mdp)){
            $dev=new DevHandler($bd=new DataBase(),$username,$mdp);
            $_SESSION['dev_id']=$dev->connect()[1];
            $_SESSION['role']=$dev->connect()[2];
            $_SESSION['username']=$dev->connect()[3];
            if(count($dev->connect())>4)
                $_SESSION['switch']=$dev->connect()[4];
            echo $dev->connect()[0];
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