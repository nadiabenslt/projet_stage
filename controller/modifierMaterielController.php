<?php 

require_once __DIR__.'/../model/Materiel.php';
$materiel=new Materiel();
if($_SERVER['REQUEST_METHOD']=='GET'){
$materielData=$materiel->getMaterielById(idMateriel: $_GET['id']);
if ($materielData){
    include('../view/responsable/modifierMateriel.php');
    exit();}
}
elseif($_SERVER['REQUEST_METHOD']=='POST'){
    $materiel->modifierMateriel($_GET['id'],$_POST);
    header('Location: ../view/responsable/materiels.php');
    exit();
}