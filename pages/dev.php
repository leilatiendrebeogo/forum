<?php
session_start();
if($_SESSION['role']=='admin' && $_SESSION['switch']=='off'){
    $_SESSION['role']='dev';
    $_SESSION['switch']='on';
}
if(count($_SESSION)==0)
    header('Location: connect.php');
elseif(isset($_SESSION['username'],$_SESSION['role'],$_SESSION['dev_id']) && $_SESSION['role']=='admin' && $_SESSION['switch']=='off')
    header('Location: admin.php');





require_once(dirname(__FILE__,2).'/config.php');
require_once('treat/PostsHandler.php');

$bd=new DataBase();

$style=ROOTcss."dev.css";
$title="Accueil";
require_once('includes/header.php');
$posts=PostsHandler::getLastPost($bd);
?>

<section class="banner d-flex flex-column align-items-center">
<h2>Salut <?= $_SESSION['username'] ?></h2>
    <h4>Ici, vous avez accès aux différentes publications en liens avec la catégorie sélectionné</h4>
    <h5>Parcourez-les , peut-être aurez-vous les réponses à vos questions ou les réponses aux questions des autres</h5>
</section>
<div class='d-flex flex-column align-items-center justify-content-center formdev-btn mt-5'>
    <a href="postEdit.php" id="edit-btn">Editer une publication</a>
</div>
<section class="innerPage">
    <?php if(count($posts[0])>0) :?>
        <?php foreach($posts as $post):?>
            
            <?php if(count($post)!=0) :?>
                <div class="d-flex flex-column align-items-center postCard">
                    <h4><?= $post['category'] ?></h4>
                    <section class="inner-card-body">
                        <header class="d-flex justify-content-between align-items-center">
                    
                            <div>
                            <div class="d-flex justify-content-center align-items-center dev-icon">
                                <?= strtoupper($post['author'][0]) ?>
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
                        <a href="categorie.php?cat=<?= $post['category'] ?>">Voir plus</a>
                    </div>
                </div>
            <?php endif;?>
        <?php endforeach; ?>

    <?php else :?>
        <h3>Aucune publication n'a été répertoriée</h3>
    <?php endif ?>

</section>









<script src="../js/notif.js"></script>
<?php require_once('includes/footer.php'); ?>