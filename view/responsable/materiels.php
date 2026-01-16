<?php
session_start();

if (
    !isset($_SESSION['personne']) ||
    !isset($_SESSION['personne']['role']) ||
    $_SESSION['personne']['role'] !== 'responsable'
) {
    header('Location: ../index.php');
    exit;
}
require_once __DIR__.'/../../controller/getMaterielsController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard Responsable</title>
<link rel="stylesheet" href="/todo-list/backend/view/responsable/dashboard.css">
</head>

<body>

<div class="sidebar">
    
    <ul>
        <li style="background-color: aliceblue;"><a href=""><img src="../images/logo-removebg-preview.png" width="100%"></a></li>
        <li><a href="./index.php">Accueil</a></li>
        <li><a href="./newMateriel.php"> Ajouter Materiel</a></li>
        <li><a href="./materiels.php" class="active"> Materiels</a></li>
        <li><a href="./interventions.php">gérer les interventions</a></li>
        <li><a href="./panne.php">Déclarer une panne</a></li>
        <li><a href="../../controller/logoutController.php" class="logout">🚪 Déconnexion</a></li>
    </ul>
</div>
<div class="main-content">
    <h2> Bonjour <?php echo $_SESSION['personne']['prenom'] .' '. $_SESSION['personne']['nom'] ?> </h2>
    <br><br>
    <h3>les materiels existent dans l'agence</h3><br>
    <table border="1">
        <tr>
            <th>numéro Série</th>
            <th>type</th>
            <th>marque</th>
            <th>date Achat</th>
            <th>prix d'Achat</th>
            <th>caracteristique</th>
            <th>location</th>
            <th>actions</th>
        </tr>
        <?php foreach ($materiels as $m): ?>
            <tr>
                <td><?php echo $m['numSerie']; ?></td>
                <td><?php echo $m['libelleTypeMateriel']; ?></td>
                <td><?php echo $m['libelleMarque']; ?></td>
                <td><?php echo $m['dateAchat']; ?></td>
                <td><?php echo $m['prix']; ?></td>
                <td><?php echo $m['caracteristique']; ?></td>
                <td><?php echo $m['caracteristique']; ?></td>
                <td><a href="../../controller/modifierMaterielController.php?id=<?= $m['idMateriel'] ?>">Modifier</a>
                <a href="../../controller/supprimerMaterielController.php?id=<?= $m['idMateriel']?>" onclick="return confirm('Supprimer ce materiel ?')">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
</div>

</body>
</html>
