<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <?php 
        if(!empty($fonts))
            echo $fonts; 
    ?>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="<?= $style; ?>">
    <title><?= $title; ?></title>
</head>
<body>


<header class="container-fluid ">
    <section class="innerHeader d-flex">
        <div class="enseigne">
            <h1><span class="part1">FORUM</span><span class="part2">PLUS</span></h1>
        </div>
        <div class="user-icons d-flex">
            <a href="">
            <figure>
                <img src="../images/bell.png" alt="">
                <div><span>2</span></div>
            </figure>
            </a>
            <a href="">
            <img src="../images/posts.png" alt="">
            </a>
            <a href="">
            <img src="../images/stats.png" alt="">
            </a>
            <a href="">
            <img src="../images/logout.png" alt="">
            </a>
        </div>
    </section>
</header>