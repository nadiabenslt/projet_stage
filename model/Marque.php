<?php 

class Marque{
    public $pdo;
public function __construct()
{
    try{
        $this->pdo=new PDO('mysql:host=localhost;dbname=parcinformatiqueaul','root','');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
        echo $e->getMessage();
    }
}
public function getMarques(){
    $req=$this->pdo->prepare('select idMarque,libelleMarque from marques');
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
}