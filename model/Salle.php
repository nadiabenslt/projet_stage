<?php 

class Salle{
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

public function getSalles(){
    $req=$this->pdo->prepare('select idSalle,salles.idDepartement idDep,nomDepartement,numSalle from salles join departements on salles.idDepartement=departements.idDepartement');
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

}