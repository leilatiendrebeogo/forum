<?php
require_once(dirname(__FILE__,3).'/config.php');
require_once('CommentsHandler.php');

$bd=new DataBase();
if(count($_POST)>3){
    $comment= new CommentsHandler($bd,$_POST['author_ID'],$_POST['post_ID'],htmlspecialchars($_POST['content']));
    $comment->comment();
}
$comments=CommentsHandler::getPostComment($bd,$_POST['post_ID'],$_POST['last_comment_ID']);
echo json_encode($comments);