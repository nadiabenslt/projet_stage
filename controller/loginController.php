<?php 
session_start();
require_once '../model/persoone.php';
$personne=new Persoone();
if(isset($_POST["conn"])){

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $user=$personne->getLoginInfo($email,$pwd);
if ($user) {
     $_SESSION['email']=$user['email'];
    $_SESSION['nom']=$user['nomPersonne'];
    $_SESSION['prenom']=$user['prenomPersonne'];
    if($personne->getRolePersonne($email,$pwd)=="responsable"){
        header('Location: ../view/responsable/index.php');
        exit();
    }else if($personne->getRolePersonne($email,$pwd)=="chefDepartement"){
        header('Location: ../view/chefDepartement/index.php');
        exit();
    }else{
        header('Location: ../view/employe/index.php');
        exit();
    }
} else {
    echo "Email ou mot de passe incorrect.";
}}
