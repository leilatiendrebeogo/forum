<?php
session_start();
if(count($_SESSION)==0)
    header('Location: connect.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='dev')
    header('Location: dev.php');


require_once(dirname(__FILE__,2).'/config.php');
require_once('treat/DevsHandler.php');

$bd=new DataBase();

$style=ROOTcss."admin.css";
$title="Page d'administration";
require('includes/header.php');

$total_devs=$bd->getData('r','SELECT COUNT(*) as total FROM devs')['total'];
$total_posts=$bd->getData('r','SELECT COUNT(*) as total FROM posts')['total'];
$total_com=$bd->getData('r','SELECT COUNT(*) as total FROM comments')['total'];

// $req=$bd->getData('r',
// 'SELECT devs.username as username, COUNT(*) as nb_posts, COUNT(*) as nb_coms, dateInscript 
// FROM devs 
// INNER JOIN posts 
// ON devs.id=posts.ID_author
// INNER JOIN comments
// ON devs.id=comments.ID_author');


$formDev=<<<FORM
<form  class="formDev invisible">
    <div class="mb-5">
        <label for="username" class="form-label">Nom d'Utilisateur</label>
        <input type="text" name="username" class="form-control" id="username">
        <p></p>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse électronique</label>
        <input type="email" class="form-control" id="email" name="email">
        <p></p>
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp">
        <p></p>
    </div>
    <div class="d-flex justify-content-evenly align-items-center">
        <button id="formdev-btn" class="btn red d-flex flex-column justify-content-center align-items-center">Annuler<img src="../images/logowhite.png" alt=""></button>
        <button type="submit" class="btn d-flex flex-column justify-content-center align-items-center">Ajouter<img src="../images/logowhite.png" alt=""></button>
    </div>
</form>
FORM;

?>
<input type="checkbox" id="checkbox">
<div class="voile"></div>
<label for="checkbox">
    <span></span>
</label>
<section class="mySideMenu">
    <h4>
        Mon tableau de bord

    </h4>
    <ul>
        <li>
            <a href="">
                <i class="fas fa-edit"></i>
                Mes posts
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-chart-line"></i>
                Mes Stats
            </a>
        </li>
        <li>
            
            <a href="">
            <i class="fas fa-chart-line"></i>
             Stats des membres</a>
        </li>
        <li>
            
            <a href="">
            <i class="fas fa-edit"></i>
             Gestion des posts</a>
        </li>
        <li>
            <a href="">
            <i class="fas fa-sign-out-alt"></i>
                Se déconnecter
            </a>
        </li>
    </ul>
</section>
<section class="innerPage">
<div class="d-flex flex-column align-items-center justify-content-center">
<section class="banner d-flex flex-column align-items-center">
    <h2>Bienvenue <?= $_SESSION['username']?></h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>
<section class="main-section">
    <div><?= $formDev ?></div>
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
    <div class='d-flex flex-column align-items-center justify-content-center formdev-btn mt-5'>
        <button id="formdev-btn">Inscrire un dévelloppeur</button>
    </div>
    <section class="d-flex justify-content-center align-items-center mt-5">

        <table>
            <thead>
            <tr>
                <th rowspan="2">Nom d'utilisateur</th>
                <th id="" rowspan="2">Nombres de Posts</th>
                <th id="" rowspan="2">Nombre de commentaires</th>
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
            <?php ?>
            </tbody>
        </table>

    </section>

</section>
</section>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/notif.js"></script>
<?php require('includes/footer.php'); ?>