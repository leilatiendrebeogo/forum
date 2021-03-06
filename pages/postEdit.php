<?php
session_start();
if(count($_SESSION)==0)
    header('Location: connect.php');

if($_SESSION['role']=='admin' && $_SESSION['switch']=='off'){
    $_SESSION['role']='dev';
    $_SESSION['switch']='on';
}
    
require_once('../config.php');
$style=ROOTcss."postEdit.css";
$title="Edition Publication";
$bd=new DataBase();
$categories=$bd->getData('r','SELECT category_name FROM categories');
$fonts='<link rel="stylesheet" href="../fonts/css/all.css">';
require_once('includes/header.php');

?>
<section class="banner d-flex flex-column align-items-center">
    <h2>Editez votre publication</h2>
    <h4>Pour rechercher de l'aide en rapport avec votre problème <br> ou <br> Pour exposer une solution face à un problème que vous avez rencontré</h4>
    <!-- <h5>Postez vos préocupations et questions liées aux développement, Aidez les autres en répondant aux questions posées via les commentaires</h5> -->
</section>
<section class="innerPage">
<a href="" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Retouner à la page précédente</a>
<div class="d-flex flex-column align-items-center postCard invisible">
    <h4>Aperçu du post</h4>
    <section class="inner-card-body">
        <header class="d-flex justify-content-between align-items-center">
            
            <div class="d-flex justify-content-center align-items-center dev-icon">
                S
            </div>

            <div class="date">
                2020-02-01
            </div>
        </header>
        <h5></h5>
        <div class="post-text p-5">
           
        </div>
        <div class="post-image m-auto d-flex justify-content-center align-items-center">
            
        </div>
        <div class="comments d-flex p-3">
        </div>
        <div class="d-flex justify-content-around">
        <input type="submit" value="Revenir" id="return">
        <input type="submit" value="Poster" id="validation">
        </div>
    </section>
</div>

            <form class="p-5">
                <h4>Publier un post</h4>
                
                <table>
                    <tr>
                        <td>
                            <label for="title">Titre du post :</label>
                        </td>
                        <td>
                            <input type="text" name="title" id="title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="category">Catégories :</label>
                        </td>
                        <td>
                            <select name="category" id="category">
                                <?php foreach($categories as $category ): ?>
                                    <option><?= $category['category_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="content">Contenu du post :</label>
                        </td>
                        <td>
                            <textarea name="content" id="content" cols="50" rows="12"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="file">Pièce jointe (facultatif)</label>
                        </td>
                        <td>
                            <select name="file_type" id="file_type">
                                    <option>image</option>
                                    <option>autres</option>
                            </select>
                                <input type="file" name="" id="file">
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Poster" id="post">
                
            </form>


</div>
</section>








<script src="../js/notif.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/sendPost.js"></script>
<?php require('includes/footer.php'); ?>