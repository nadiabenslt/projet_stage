<?php 
session_start();

require_once __DIR__.'/../model/persoone.php';
$personne=new Persoone();
if(isset($_POST["conn"])){

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $user=$personne->getLoginInfo($email,$pwd);
if ($user) {
    $_SESSION['personne']=[
        'email'=>$user['email'],
        'nom'=>$user['nomPersonne'],
        'prenom'=>$user['prenomPersonne'],
        'role'=>$user['role']
    ];

    if(isset($_POST['remember'])){
        setcookie("role", $user['role'], time() + 86400);
    }
    switch($user['role']){
        case 'responsable':
            header('Location: ../view/responsable/index.php');
            exit();
        case 'chefDepartement':
            header('Location: ../view/chefDepartement/index.php');
            exit();
        case 'employe':
            header('Location: ../view/employe/index.php');
            exit();
    }
} else {
    echo "Email ou mot de passe incorrect.";
}}
