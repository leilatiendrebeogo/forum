<?php

class CommentsHandler
{
    protected $post_ID;
    protected $author_ID;
    protected $comment_content;
    protected $bd;

    public function __construct(DataBase $bd,$author_ID,$post_ID,$comment_content)
    {
        $this->bd=$bd;
        $this->author_ID=$author_ID;
        $this->post_ID=$post_ID;
        $this->comment_content=$comment_content;

    }

    public function comment(){
        $this->bd->getData('w','INSERT INTO comments(author_ID,post_ID,comment_content,date) VALUES(?,?,?,NOW())',[$this->author_ID,$this->post_ID,$this->comment_content]);
    }

    public static function getPostComment(DataBase $bd,$post_ID,$last_Comment_ID=0){
        if($last_Comment_ID!=0){
            $comments=$bd->getData('r',"SELECT comments.id as id,devs.username as author,comment_content as content,DATE_FORMAT(comments.date,'le %d/%m/%y à %h heures %i minutes %s sec') as date FROM comments INNER JOIN devs ON author_ID=devs.id WHERE post_ID=? AND comments.id>? ORDER BY date",[$post_ID,$last_Comment_ID]);
        } else{
            $comments=$bd->getData('r','SELECT comments.id as id,devs.username as author,comment_content as content,DATE_FORMAT(comments.date,"le %d/%m/%y à %h heures %i minutes %s sec") as date FROM comments INNER JOIN devs ON author_ID=devs.id WHERE post_ID=?',[$post_ID]);
            
        }

        if(array_key_first($comments)=='id')
            return [$comments];

        return $comments;
    }

    
}