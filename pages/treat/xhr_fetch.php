<?php 

require_once(dirname(__FILE__,2).'/config.php');
require_once('treat/CommentsHandler.php');

CommentsHandler::getPostComment($bd=new DataBase(),10);