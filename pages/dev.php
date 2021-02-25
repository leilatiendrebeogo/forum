<?php
session_start();
if(count($_SESSION)==0)
    header('Location: connect.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='admin')
    header('Location: admin.php');

if($_SESSION['role']=='admin' && $_SESSION['switch']=='off'){
    $_SESSION['role']='dev';
    $_SESSION['switch']='on';
}



require_once(dirname(__FILE__,2).'/config.php');
require_once('treat/PostsHandler.php');

$bd=new DataBase();

$style=ROOTcss."dev.css";
$title="Accueil";
require_once('includes/header.php');
$posts=PostsHandler::getLastPost($bd);

?>

<section class="banner d-flex flex-column align-items-center">
    <h2>Salut <? //$name ?></h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>
<div class='d-flex flex-column align-items-center justify-content-center formdev-btn mt-5'>
    <a href="postEdit.php" id="edit-btn">Editer une publication</a>
</div>
<section class="innerPage">
    <?php foreach($posts as $post):?>
        <div class="d-flex flex-column align-items-center postCard">
            <h4><?= $post['category'] ?></h4>
            <section class="inner-card-body">
                <header class="d-flex justify-content-between align-items-center">
            
                    <div>
                    <div class="d-flex justify-content-center align-items-center dev-icon">
                        <?= $post['author'][0] ?>
                    </div>
                    <div class="author">Par 
                        <?= $post['author'] ?>
                    </div>
                    </div>
                        
                    <div class="date">
                        <?= $post['date'] ?>
                    </div>
                </header>
                <h5><?= $post['title'] ?></h5>
                <div class="post-text p-5">
                    <?= substr($post['content'],0,300)."..." ?>
                </div>
        
            </section>
            <div class="btn btn-primary">
                <a href="post.php?id=<?= $post['id'] ?>">Voir plus</a>
            </div>
        </div>
    <?php endforeach;?>
    



</section>









<script src="../js/notif.js"></script>
<?php require_once('includes/footer.php'); ?>