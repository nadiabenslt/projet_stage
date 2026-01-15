<?php
session_start();

if (
    !isset($_SESSION['personne']) ||
    !isset($_SESSION['personne']['role']) ||
    $_SESSION['personne']['role'] !== 'employe'
) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard employe</title>
<link rel="stylesheet" href="dashboard.css">
</head>

<body>

<div class="sidebar">
    
    <ul>
        <li style="background-color: aliceblue;"><a href=""><img src="../images/logo-removebg-preview.png" width="100%"></a></li>
        <li><a href="./index.php" class="active">Accueil</a></li>
        <li><a href="./pannes.php"> Les demandes des employées</a></li>
        <li><a href="./interventions.php">Déclarer une panne</a></li>
        <li><a href="../../controller/logoutController.php" class="logout">🚪 Déconnexion</a></li>
    </ul>
</div>
<div class="main-content">
    <h2> Bonjour <?php echo $_SESSION['personne']['prenom'] .' '. $_SESSION['personne']['nom'] ?> </h2>
</div>

</body>
</html>
