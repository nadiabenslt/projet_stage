<?php 

class Persoone{
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
    public function getLoginInfo($email,$pwd){
            $stmt = $this->pdo->prepare("SELECT idPersonne,prenomPersonne,nomPersonne,email,mot_de_passe,role FROM personnes Where email =? and mot_de_passe =?");
            $stmt->execute(([$email,$pwd]));
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
