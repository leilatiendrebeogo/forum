<?php

function verifSession(){
     
}











define("ROOTcss","http://localhost/forum/css/");
define("ALL",1);


class DataBase{

    protected $database_type;
    protected $host;
    protected $dbname;
    protected $charset;
    protected $user;
    protected $password;
    public $data;
    protected $bd;

    public function __construct(string $database_type='mysql',string $host='localhost',string $dbname='forum',string $charset='utf8',string $user='root',string $password='')
    {
        $this->database_type=$database_type;
        $this->host=$host;
        $this->dbname=$dbname;
        $this->charset=$charset;
        $this->user=$user;
        $this->password=$password;
        $this->bd=$this->startConnection();
    }
    
    public function startConnection()
    {
        $bd=new PDO("$this->database_type:hostname=$this->host;dbname=$this->dbname;charset=$this->charset",$this->user,$this->password);
        $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

        return $bd;
    }

    public function getData(string $req_type,string $req_sql,array $params=[])
    {
        $req=$this->bd->prepare($req_sql);
        if(empty($params))
            $req->execute();
        else $req->execute($params);
        
        
        if($req_type=='r') {

            $datas=$req->fetchAll(PDO::FETCH_ASSOC);
            if(count($datas)==1)
                $datas=$datas[0];
            // do {
            //     if(count($datas)!=0)
            //         // $datas=$req->fetch(PDO::FETCH_ASSOC);

            //     $datas=$req->fetch(PDO::FETCH_ASSOC);
                
            // }
            // while ($req->fetch(PDO::FETCH_ASSOC));
            return $datas;
            
        }
        
        
    }

    public function existAdmin()
    {
       
        $adminInfo= $this->getData('r',"SELECT * FROM devs WHERE role='admin'");
        if(!$adminInfo)
            header('Location: pages/inscript.php');
        else{
            header('Location: pages/connect.php');
        }
    }
    
}
$bd=new DataBase();