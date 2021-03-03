<?php
session_start();
require_once('../../config.php');
require_once('PostsHandler.php');

if(count($_POST)!=4)
    die('unavalaible');
elseif(isset($_POST['title'],$_POST['content'],$_POST['category']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['category'])){
    $post=new PostsHandler($bd=new DataBase(),$_SESSION['username'],$_POST['title'],$_POST['category'],$_POST['content']);
    $post->post();
} else
    die('Erreur');

