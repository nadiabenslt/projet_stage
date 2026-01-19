<?php 

require_once __DIR__.'/../model/Affectation.php';
require_once __DIR__.'/../model/Materiel.php';
$affectation=new Affectation();
$materiel=new Materiel();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $materielData=$materiel->getMaterielById( $_GET['id']);
    if($materielData){
        include('../view/responsable/affectation.php');
        exit();
    }}else{
        if(isset($_POST['affecterMateriel'])){
            $affectation->affecterMateriel($_POST);
            header('Location: ../view/responsable/materiels.php');
            exit();
        }
    
}