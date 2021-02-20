<?php
// session_start();

// if(isset($_SESSION['username'],$_SESSION['role']) && $_SESSION['role']=='admin')
//   header('Location: admin.php');
// elseif(isset($_SESSION['username'],$_SESSION['role']) && $_SESSION['role']=='dev')
//   header('Location: dev.php');
// else
//   header('Location: '.dirname(__FILE__,1).'index.php');



require('../config.php');
$style=ROOTcss."connect.css";
$title="Inscription ForumPlus";
require('includes/header.php'); 

?>
<div class="d-flex flex-column align-items-center justify-content-center">
<section class="banner d-flex flex-column align-items-center">
    <h2>Bienvenue sur FORUMPLUS</h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Veuillez remplir les différents champs ci-dessous afin de confirmer votre statut d'administrateur</h5>
</section>

<form>
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
  <div class="mb-3">
    <label for="mdp_confirm" class="form-label">Confirmation mot de passe</label>
    <input type="password" class="form-control" id="mdp_confirm" name="mdp_confirm">
    <p></p>
  </div>
  <button type="submit" class="btn d-flex flex-column justify-content-center align-items-center">Se connecter<img src="../images/logowhite.png" alt=""></button>
</form>
</div>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/connect.js"></script>
<?php require('includes/footer.php'); ?>
