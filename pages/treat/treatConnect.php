<?php
require_once('../../config.php');

if(isset($_POST) && !empty($_POST)){
    extract($_POST);
    if (count($_POST)==2) {
        if(isset($username,$mdp) && !empty($username) && !empty($mdp)){
            $datas=$bd->prepare('SELECT username,mdp,role FROM devs WHERE username=?');
            $datas->execute([$username]);
            $data=$datas->fetch();
            if(!$data)
                die('wrong data');
            elseif($data['username']==$username && password_verify($mdp,$data['mdp'])) {
                if($data['role']=='admin')
                    header("Location: admin.php?username=".$username);
                elseif($data['role']=='dev')
                    header("Location: dev.php?username=".$username);
            }
        }
    } elseif (count($_POST)==4) {
        if(isset($username,$mdp,$mdp_confirm,$email) && !empty($username) && !empty($mdp) && !empty($mdp_confirm) && !empty($email)){
            if ($mdp_confirm!=$mdp)
                die('unavalaible data');

            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $datas=$bd->prepare('INSERT INTO devs(username,mdp,email) VALUES(?,?,?)');
                $datas->execute([$username,password_hash($mdp,PASSWORD_BCRYPT),$email]);
                echo('admin.php');
            }
        }
    } else 
        die('unavalaible data');
} else
    die('unavalaible data');