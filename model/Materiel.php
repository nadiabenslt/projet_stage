<?php 

class Materiel{
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
public function ajouterMateriel($data){
    $req=$this->pdo->prepare('INSERT INTO materiels (numSerie, idTypeMateriel, idMarque, dateAchat, prix, caracteristique) VALUES (?,?,?,?,?,?)');
    return $req->execute([$data['numSerie'],$data['typeM'],$data['marque'],$data['dateAchat'],$data['prixAchat'],$data['caracteristique']]);
}
}