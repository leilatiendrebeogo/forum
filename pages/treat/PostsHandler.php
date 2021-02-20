<?php


class PostsHandler{
    protected $post_message;
    protected $id_author;
    protected $postDate;
    protected $title;
    protected $category;
    protected $files;
    
    public function __construct($id_author,$message,$title)
    {
        $this->postAuthor=$id_author;
        $this->postMessage=$message;
        $this->title=$title;

    }


    public function post(){
        $req=$bd->prepare('INSERT INTO posts(ID_author,ID_category,title,post_message,files) VALUES (?,?,?,?,NOW()');
    }

    public static function getLastPost(string $category){
        
    }

    
}









if(!empty($_POST) && isset($_POST)){
    extract($_POST);
    if(isset($content,$category,$title) && !empty($content) && !empty($category) && !empty($title)){

    }
    
} else die('Erreur');