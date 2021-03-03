<?php
define('GET_BY_CATEGORY',0);
define('GET_BY_AUTHORNAME',1);
define('GET_FOR_ALLCATEGORIES',3);

class PostsHandler{
    protected $post_message;
    protected $author_ID;
    protected $postDate;
    protected $title;
    protected $category_ID;
    protected $files;
    protected $bd;
    
    public function __construct(DataBase $bd,$author_username,$title,$category,$message)
    {
        $this->bd=$bd;
        $this->title=$title;
        $this->category=$category;
        $this->post_message=$message;
        $this->author_ID=$this->bd->getData('r','SELECT id FROM devs WHERE username=?',[$author_username])['id'];
        $this->category_ID=$this->bd->getData('r','SELECT id FROM categories WHERE category_name=?',[$category])['id'];
        
    }


    public function post()
    {
        $this->bd->getData('w',
        "INSERT INTO posts(title,author_ID,category_ID,post_content,date) 
        VALUES (?,?,?,?,NOW())",
        [$this->title,$this->author_ID,$this->category_ID,$this->post_message]);
        echo 'posted';
    }

    public static function getLastPost(DataBase $bd,string $category_or_author_wanted='',string $mode=GET_FOR_ALLCATEGORIES)
    {
        if($mode==GET_BY_CATEGORY){
            $sql='SELECT posts.id as id,devs.username as author,categories.category_name as category,posts.title as title,posts.post_content as content,DATE_FORMAT(posts.date,"le %d/%m/%y à %h heures %i minutes %s secondes") as date
            FROM posts
            INNER JOIN devs
            ON posts.author_ID=devs.id
            INNER JOIN categories
            ON posts.category_ID=categories.id
            WHERE posts.date=(SELECT MAX(posts.date) FROM posts WHERE category_ID=?)';
            $category=$bd->getData('r','SELECT id FROM categories WHERE category_name=?',[$category_or_author_wanted]);
            $lastPosts=$bd->getData('r',$sql,[$category['id']]);

        } elseif($mode==GET_BY_AUTHORNAME){
            $sql='SELECT posts.id as id,devs.username as author,categories.category_name as category,posts.title as title,posts.post_content as content,DATE_FORMAT(posts.date,"le %d/%m/%y à %h heures %i minutes %s secondes") as date
            FROM posts
            INNER JOIN devs
            ON posts.author_ID=devs.id
            INNER JOIN categories
            ON posts.category_ID=categories.id
            WHERE posts.date=(SELECT MAX(posts.date) FROM posts WHERE posts.author_name=?)';
            $author=$bd->getData('r','SELECT id FROM devs WHERE username=?',[$category_or_author_wanted]);
            $lastPosts=$bd->getData('r',$sql,[$author['id']]);
        } elseif($mode==GET_FOR_ALLCATEGORIES){
            $categories=$bd->getData('r','SELECT id FROM categories ORDER BY id ASC');
            $lastPosts=[];
            foreach($categories as $category){
                $sql='SELECT posts.id as id,devs.username as author,categories.category_name as category,posts.title as title,posts.post_content as content,DATE_FORMAT(posts.date,"le %d/%m/%y à %h heures %i minutes %s secondes") as date
                FROM posts
                INNER JOIN devs
                ON posts.author_ID=devs.id
                INNER JOIN categories
                ON posts.category_ID=categories.id
                WHERE posts.date=(SELECT MAX(posts.date) FROM posts WHERE category_ID=?)';
                $lastPost=$bd->getData('r',$sql,[$category['id']]);
                array_push($lastPosts,$lastPost);
            }
        } else
            die('Erreur sur les paramètres de la fonction');

            



        return $lastPosts;
    }

    public static function getPost(DataBase $bd,int $id_post)
    {
        $post=$bd->getData('r','SELECT posts.id as id,devs.username as author,categories.category_name as category,posts.title as title,posts.post_content as content,DATE_FORMAT(posts.date,"le %d/%m/%y à %h heures %i minutes %s secondes") as date
        FROM posts
        INNER JOIN devs
        ON posts.author_ID=devs.id
        INNER JOIN categories
        ON posts.category_ID=categories.id
        WHERE posts.id=?',[$id_post]);
        return $post;
    }
    public static function getAllCatPosts(DataBase $bd,string $category)
    {

        $posts=$bd->getData('r','SELECT posts.id as id,devs.username as author,categories.category_name as category,posts.title as title,posts.post_content as content,DATE_FORMAT(posts.date,"le %d/%m/%y à %h heures %i minutes %s secondes") as date
        FROM posts
        INNER JOIN devs
        ON posts.author_ID=devs.id
        INNER JOIN categories
        ON posts.category_ID=categories.id
        WHERE posts.category_ID=(SELECT categories.id from categories WHERE categories.category_name=?) LIMIT 50',[$category]);
        return $posts;
    }
    
}