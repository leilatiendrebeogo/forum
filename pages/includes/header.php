<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fonts/css/all.css">
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
            <a href="#" title="Notifications">
                <figure>
                    <img src="../images/bell.png" alt="">
                    <div><span>4</span></div>
                </figure>
            </a>
            <a href="#" title="Editer un post">
                <i class="fas fa-edit"></i>
            </a>
            <a href="#" title="Voir mes statistiques">
                <i class="fas fa-chart-line"></i>
            </a>
            <a href="" title="Se déconnecter" class="logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </section>
</header>