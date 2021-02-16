<?php
error_reporting(0);
require('../config.php');
$style=ROOTcss."index.css";
$title="Page d'administration";
require('includes/header.php');

?>

<section class="banner d-flex flex-column align-items-center">
    <h2>Bienvenue ForumPLus</h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>
<section class="innerPage">

<div class="d-flex flex-column align-items-center postCard">
    <h4>PHP</h4>
    <section class="inner-card-body">
        <header class="d-flex justify-content-between align-items-center">
            
            <div class="d-flex justify-content-center align-items-center dev-icon">
                S
            </div>

            <div class="date">
                2020-02-01
            </div>
        </header>
        <div class="post-text p-5">
           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi dolorem neque quidem soluta laborum expedita reiciendis quam quia? Quidem culpa error autem molestias eos earum porro dolorum nulla eligendi at.
        </div>
        <div class="comments d-flex p-3">
            <div class="d-flex justify-content-center align-items-center dev-icon">
                S
            </div>
            <div class="ml-3 comment-content">
                <h5>Shazam72</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime nulla numquam quae itaque ad ab similique eum? Commodi, hic culpa!
            </div>
            <span>
                2020-02-25
            </span>
        </div>
    </section>
    <div class="btn btn-primary">
        <a href="">Voir plus</a>
    </div>
</div>
</section>










<?php require('includes/footer.php'); ?>