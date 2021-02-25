<?php
// require_once('../../config.php');


class DevHandler{
    protected $username;
    protected $email;
    protected $mdp;
    protected $bd;
    

    public function __construct(DataBase $bd,string $username,string $mdp,string $email='')
    {
        $this->bd=$bd;
        $this->bd->startConnection();
        $this->username=$username;
        $this->email=$email;
        $this->mdp=$mdp;   
    }
    public static function getDevStats(DataBase $bd){
        $members_infos=$bd->getData('r',
            'SELECT devs.username as username,
            (SELECT COUNT(posts.id) FROM posts WHERE devs.id=posts.author_ID) as nb_posts,
            (SELECT COUNT(comments.id) FROM comments WHERE comments.id=devs.id) as nb_comments,
            DATE_FORMAT(devs.dateInscript,"le %d/%m/%y") as date
            FROM devs
            LEFT JOIN posts
            ON devs.id=posts.author_ID
            LEFT JOIN comments
            ON comments.author_ID=devs.id
            GROUP BY username
            HAVING username<>(SELECT username FROM devs WHERE role="admin")');

        return $members_infos;

    }


    public function saveDev()
    {
        $result=$this->bd->getData('r','SELECT COUNT(*) AS nb FROM devs WHERE email=?',[$this->email]);
        if($result['nb']!=0)
            die('already saved');
        else {
            $this->bd->getData('w','INSERT INTO devs(username,mdp,email,dateInscript) VALUES(?,?,?,NOW())',[$this->username,password_hash($this->mdp,PASSWORD_BCRYPT),$this->email]);
            echo 'dev saved';
        }
    }
    public function saveAdmin()
    {
        $this->bd->getData('w','INSERT INTO devs(username,mdp,email,role,dateInscript) VALUES(?,?,?,"admin",NOW())',[$this->username,password_hash($this->mdp,PASSWORD_BCRYPT),$this->email]);
        echo('admin.php');
    }

    public function connect()
    {
        $data=$this->bd->getData('r','SELECT id,username,mdp,role FROM devs WHERE username=?',[$this->username]);
        if(!$data)
            die('wrong data');
        elseif($data['username']==$this->username && password_verify($this->mdp,$data['mdp'])) {
            if($data['role']=='admin')
                return ['admin.php',$data['id'],$data['role'],$data['username'],"off"];
            elseif($data['role']=='dev')
                return ['dev.php',$data['id'],$data['role'],$data['username']];
        }
    }

}