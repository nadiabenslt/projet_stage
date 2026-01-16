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
public function getMateriels(){
    $req=$this->pdo->prepare('select idMateriel,numSerie,libelleTypeMateriel,libelleMarque,dateAchat,prix,caracteristique from materiels m join typesMateriels tm on m.idTypeMateriel=tm.idTypeMateriel join marques on m.idMarque=marques.idMarque');
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
public function modifierMateriel($idMateriel,$data){
    $req=$this->pdo->prepare('update materiels set numSerie=?,idTypeMateriel=?,idMarque=?,dateAchat=?,prix=?,caracteristique=? where idMateriel=?');
    return $req->execute([$data['numSerie'],$data['typeM'],$data['marque'],$data['dateAchat'],$data['prixAchat'],$data['caracteristique'],$idMateriel]);
}
public function supprimerMateriel($idMateriel){
    $req=$this->pdo->prepare('delete from materiels where idMateriel=?');
    return $req->execute([$idMateriel]);
}
public function getMaterielById($idMateriel){
    $req=$this->pdo->prepare('select idMateriel,numSerie,libelleTypeMateriel,libelleMarque,dateAchat,prix,caracteristique from materiels m join typesMateriels tm on m.idTypeMateriel=tm.idTypeMateriel join marques on m.idMarque=marques.idMarque where idMateriel=?');
    $req->execute([$idMateriel]);
    return $req->fetch(PDO::FETCH_ASSOC);
}
}