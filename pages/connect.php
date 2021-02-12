<?php

include('../config.php');
$style=ROOTcss."connect.css";
$title="Connexion ForumPlus";
include('includes/header.php'); 

?>
<div class="d-flex flex-column align-items-center justify-content-center">
<section class="banner d-flex flex-column align-items-center">
    <h2>Bienvenue sur FORUMPLUS</h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>

<form method="POST" action="#">
  <div class="mb-3">
    <label for="email" class="form-label">Nom d'Utilisateur</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="mdp" class="form-label">Mot de passe:</label>
    <input type="password" class="form-control" id="mdp" name="mdp">
  </div>
  <button type="submit" class="btn d-flex flex-column justify-content-center align-items-center">Se connecter<img src="../images/logowhite.png" alt=""></button>
</form>
</div>
<?php include('includes/footer.php'); ?>
