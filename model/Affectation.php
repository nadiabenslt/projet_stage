<?php 

class Affectation{
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


public function affecterMateriel($data){
    $req=$this->pdo->prepare('insert into affectations (dateAffectation,idMateriel,idSalle) values (?,?, ?)');
    return $req->execute([$data['dateAffectation'],$data['idMateriel'],$data['salle']]);
}
}