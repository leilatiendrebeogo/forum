<?php
error_reporting(0);
require('../config.php');
$style=ROOTcss."admin.css";
$title="Page d'administration";
require('includes/header.php');
$req=$bd->query('SELECT sum(nb_posts) as total_posts,sum(nb_com) as total_com,COUNT(*) as total_devs FROM devs')->fetch(PDO::FETCH_ASSOC);
if($req){
    extract($req);

}
?>
<input type="checkbox" id="checkbox">
<label for="checkbox">
    <span></span>
</label>
<section class="mySideMenu">
    <h4>
        Mon tableau de bord

    </h4>
    <div></div>
    <ul>
        <li>
            <a href="">
                <img src="../images/posts.png" alt="">
                Mes posts
            </a>
        </li>
        <li>
            <a href="">
                <img src="../images/stats.png" alt="">
                Mes Stats
                
            </a>
        </li>
        <li>
            <a href=""> Stats des membres</a>
        </li>
        <li>
            <a href=""> Gestion des posts</a>
        </li>
        <li>
            <a href="">
                <img src="../images/logout.png" alt="">
                Se déconnecter
            </a>
        </li>
    </ul>
</section>
<section class="innerPage">
<div class="d-flex flex-column align-items-center justify-content-center">
<section class="banner d-flex flex-column align-items-center">
    <h2>Bienvenue <?= $_GET['username']?></h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>
<section class="main-section">
    <section>
        <h3>Statistiques des membres</h3>
        <div class="d-flex mt-5">
            <div class="d-flex flex-column justify-content-center align-items-center members">
                <span><?= $total_devs ?></span>
                membres
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center posts">
                <span><?= $total_posts ?></span>
                publications
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center comments">
                <span><?= $total_com ?></span>
                commentaires
            </div>
        </div>
    </section>
    <section class="d-flex justify-content-center align-items-center mt-5">

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th rowspan="2">Nom d'utilisateur</th>
                <th rowspan="2">Nombres de Posts</th>
                <th rowspan="2">Nombre de commentaires</th>
                <th colspan="2">Dernier Post</th>
                <th colspan="2">Dernier commentaire</th>
                <th rowspan="2">Date d'inscription</th>
            </tr>
            <tr>
                <th>Catégories</th>
                <th>Date</th>
                <th>Catégories</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            
            ?>
            </tbody>
        </table>

    </section>

</section>
</section>
<script src="../js/admin.js"></script>
<?php require('includes/footer.php'); ?>