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

require_once __DIR__.'/../../controller/getSallesController.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard responsable</title>
<link rel="stylesheet" href="./dashboard.css">
</head>

<body>

<div class="sidebar">
    
    <ul>
        <li style="background-color: aliceblue;"><img src="../images/logo-removebg-preview.png" width="100%"></li>
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
        <input type="text" name="idMateriel" value="<?= $materielData['idMateriel'] ?>">
        <label for="numSerie">Numéro Série:</label>
        <input type="text" name="numSerie" id="numSerie" value="<?= $materielData['numSerie']?>" readonly ><br><br>
        <label for="dateAffectation">Date Affectation:</label>
        <input type="date" name="dateAffectation" id="dateAffectation" ><br><br>
        <select id="departement" name="departement">
            <?php foreach ($salles as $s): ?>
                <option value="<?php echo $s['idDep']; ?>"><?php echo $s['nomDepartement']; ?></option>
            <?php endforeach; ?>
        </select> <br><br>
        <select id="salle" name="salle">
            <?php foreach ($salles as $s): ?>
                <option value="<?php echo $s['idSalle']; ?>"><?php echo $s['numSalle']; ?></option>
            <?php endforeach; ?>
        </select> <br><br>
        <button type="submit" name="affecterMateriel">Ajouter</button>
    </form>
</div>

</body>
</html>
