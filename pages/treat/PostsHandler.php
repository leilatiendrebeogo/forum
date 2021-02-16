<?php
include('../../config.php');







class PostsHandler{
    protected $post_message;
    protected $id_author;
    protected $postDate;
    
    public function __construct($id_author,$message)
    {
        $this->postAuthor=$id_author;
        $this->postMessage=$message;
    }


    public function post(string $post_message, object $id_author){
        
    }

    public function getLastPost(string $category){
        
    }

    
}