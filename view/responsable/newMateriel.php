<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Dashboard Responsable</title>
<link rel="stylesheet" href="dashboard.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Parc Info</h2>
    <ul>
        <li><a href="./index.php" class="active">🏠 Home</a></li>
        <li><a href="./newMateriel.php">➕ Ajouter matériel</a></li>
        <li><a href="./materiels.php">💻 Matériels</a></li>
        <li><a href="./pannes.php">⚠️ Pannes</a></li>
        <li><a href="./interventions.php">🛠️ Interventions</a></li>
        <li><a href="../logout.php" class="logout">🚪 Déconnexion</a></li>
    </ul>
</div>

<!-- CONTENT -->
<div class="main-content">
    <h1>Bienvenue Responsable 👋</h1>

    <div class="cards">
        <div class="card">
            <h3>Matériels</h3>
            <p>Gérer les matériels</p>
            <a href="materiels.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Pannes</h3>
            <p>Suivi des pannes</p>
            <a href="pannes.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Interventions</h3>
            <p>Gestion des interventions</p>
            <a href="interventions.php">Accéder</a>
        </div>

        <div class="card">
            <h3>Utilisateurs</h3>
            <p>Employés & chefs</p>
            <a href="personnes.php">Accéder</a>
        </div>
    </div>
</div>

</body>
</html>
