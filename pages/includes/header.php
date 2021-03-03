<?php
if (isset($_SESSION['switch'])) {
    if($_SESSION['switch']=='on'){
        $admin_stuff=<<<ADMIN
        <div class="d-flex modes">
            <a href="admin.php">
                <h6 class="d-flex justify-content-center align-items-center admin">Mode Administrateur</h6>
            </a>
            <a href="dev.php">
                <h6 class="d-flex justify-content-center align-items-center btn-primary dev">Mode Dévéloppeur</h6>
            </a> 
        </div>
ADMIN;
    }
    else{
        $admin_stuff=<<<ADMIN
        <div class="d-flex modes">
            <a href="admin.php">
                <h6 class="d-flex justify-content-center align-items-center btn-primary admin">Mode Administrateur</h6>
            </a>
            <a href="dev.php">
                <h6 class="d-flex justify-content-center align-items-center dev">Mode Dévéloppeur</h6>
            </a> 
        </div>
        
ADMIN;
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/Forum/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Forum/fonts/css/all.css">
    <link rel="stylesheet" href="http://localhost/Forum/css/header.css">
    <link rel="stylesheet" href="<?= $style; ?>">
    <script src="http://localhost/Forum/js/sweetalert.min.js"></script>
    <title><?= $title; ?></title>
</head>
<body>


<header class="container-fluid ">
    <section class="innerHeader d-flex justify-content-between">
        <div class="enseigne">
            <a href="dev.php">
                <h1><span class="part1">FORUM</span><span class="part2">PLUS</span></h1>
            </a>
        </div>
        <?php if(isset($admin_stuff)) echo $admin_stuff; ?>
        <div class="user-icons d-flex">
            <a href="#" title="Notifications">
                <figure>
                    <img src="http://localhost/Forum/images/bell.png" alt="">
                    <div><span>4</span></div>
                </figure>
            </a>
            <a href="postEdit.php" title="Editer un post">
                <i class="fas fa-edit"></i>
            </a>
            <a href="http://localhost/Forum/pages/stats.php" title="Voir mes statistiques">
                <i class="fas fa-chart-line"></i>
            </a>
            <a href="#" title="Se déconnecter" class="logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </section>
</header>