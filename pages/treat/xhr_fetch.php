<?php 

require_once(dirname(__FILE__,3).'/config.php');
require_once('DevsHandler.php');

$total_devs=$bd->getData('r','SELECT COUNT(*) as total FROM devs')['total']-1;
$total_posts=$bd->getData('r','SELECT COUNT(*) as total FROM posts')['total'];
$total_com=$bd->getData('r','SELECT COUNT(*) as total FROM comments')['total'];
echo json_encode(['members'=>$total_devs,'posts'=>$total_posts,'comments'=>$total_com]);

// echo json_encode([DevHandler::getDevStats($bd)]);