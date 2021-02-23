<?php 
session_start();
if(count($_SESSION)==0)
    header('Location: connect.php');

if(count($_GET)==0)
    header('Location: dev.php');

require_once(dirname(__FILE__,2).'/config.php');
require_once('treat/PostsHandler.php');
require_once('treat/CommentsHandler.php');
$bd=new DataBase();
$style=ROOTcss."post.css";
$title="Post";
$fonts='<link rel="stylesheet" href="../fonts/css/all.css">';
require_once('includes/header.php');
$post=PostsHandler::getPost($bd,$_GET['id']);
$comments=CommentsHandler::getPostComment($bd,$_GET['id']);
?>


<section class="banner d-flex flex-column align-items-center">
    <h2>Salut <? $_SESSION['username'] ?></h2>
    <h4>Forum d'aide et de conseils à l'endroit des développeurs de LacSoft Enterprises</h4>
    <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5>
</section>
<section class="innerPage">

<div class="d-flex flex-column align-items-center postCard">

    <h4><?= $post['category'] ?></h4>
                <section class="inner-card-body">
                    <header class="d-flex justify-content-between align-items-center">
                
                        <div>
                        <div class="d-flex justify-content-center align-items-center dev-icon">
                            <?= 'd' ?>
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
                        <?= $post['content'] ?>
                    </div>
            
        </section>
</div>
<section class="d-flex flex-column justify-content-between inner-comments">
    <div class="other-comments">
        <?php foreach($comments as $comment) :?>
            <div class="mt-5 comments d-flex p-3">
            <div class="d-flex justify-content-center align-items-center dev-icon">
                <?=$comment['author'][0] ?>
            </div>
            <div class="ml-3 comment-content">
                <h5> <?=$comment['author'] ?></h5>
                 <?=$comment['content'] ?>
            </div>
            <span>
             <?=$comment['date'] ?>
            </span>
        </div>

        <?php endforeach;?>
    </div>
    <div class="d-flex flex-column align-items-end my_comment">
        <form class="comments">
            <input type="text" name="post_ID" value="<?= $_GET['id'] ?>" hidden>
            <input type="text" name="author_ID" value="<?= $_SESSION['dev_id'] ?>" hidden>
            <input type="text" name="last_comment_ID" value="<?= end($comments)['id'] ?>" hidden>
            <div class="comment-content">
            <textarea name="content" id="content" cols="30" rows="7" placeholder="Commenter"></textarea>
            <button type="submit">Commenter</button>
            </div>
        </form>
    </div>
        
</section>



</section>
























<script src="../js/notif.js"></script>
<script src="../js/comment.js"></script>
<?php require('includes/footer.php'); ?>