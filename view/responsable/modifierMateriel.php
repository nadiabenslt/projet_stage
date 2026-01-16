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
require_once __DIR__.'/../../controller/getTypeMaterielController.php';

require_once __DIR__.'/../../controller/getMarquesController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard responsable</title>
<link rel="stylesheet" href="/todo-list/backend/view/responsable/dashboard.css">
</head>

<body>

<div class="sidebar">
    <ul>
        <li style="background-color: aliceblue;"><a href=""><img src="../images/logo-removebg-preview.png" width="100%"></a></li>
        <li><a href="./index.php">Accueil</a></li>
        <li><a href="./newMateriel.php" class="active"> Ajouter Materiel</a></li>
        <li><a href="./materiels.php"> Materiels</a></li>
        <li><a href="./interventions.php">gérer les interventions</a></li>
        <li><a href="./panne.php">Déclarer une panne</a></li>
        <li><a href="../../controller/logoutController.php" class="logout">🚪 Déconnexion</a></li>
    </ul>
</div>
<div class="main-content">
    <h2> Bonjour <?php echo $_SESSION['personne']['prenom'] .' '. $_SESSION['personne']['nom'] ?> </h2>
    <br><br>
    <form method="post" action="">
        <label for="numSerie">Numéro Série:</label>
        <input type="text" name="numSerie" id="numSerie" value="<?= $materielData['numSerie'] ?>"><br><br>
        <label for="typeM">type materiel :</label>
        <select id="typeM" name="typeM">
            <?php foreach ($types as $type): ?>
                <option value="<?php echo $type['idTypeMateriel']; ?>"><?php echo $type['libelleTypeMateriel']; ?></option>
            <?php endforeach; ?>
        </select> <br><br>
        <label for="marque">Marque :</label>
        <select id="marque" name="marque">
            <?php foreach ($marques as $marque): ?>
                <option value="<?php echo $marque['idMarque']; ?>"><?php echo $marque['libelleMarque']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="dateAchat">date Achat:</label>
        <input type="date" name="dateAchat" id="dateAchat" value="<?php echo $materielData['dateAchat'] ?>"><br><br>
        <label for="prixAchat">Prix:</label>
        <input type="text" name="prixAchat" id="prixAchat" value="<?php echo $materielData['prix'] ?>"><br><br>
        <label for="caracteristique">caracteristique:</label>
        <input type="text" name="caracteristique" id="caracteristique" value="<?php echo $materielData['caracteristique'] ?>"><br><br>
        <button type="submit" name="ajouterMateriel">Ajouter</button>
    </form>
</div>

</body>
</html>
