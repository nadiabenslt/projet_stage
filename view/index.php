
<?php
session_start();
if (isset($_SESSION["personne"])){
    switch($_SESSION['personne']['role']){
        case 'responsable':
            header('Location: ./responsable/index.php');
            exit;
        case 'chefDepartement':
            header('Location: ./chefDepartement/index.php');
            exit;
        case 'employe':
            header('Location: ./employe/index.php');
            exit;
    }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./styles/index.css" rel="stylesheet">
</head>
<body>
    <div class="overlay">
        <div class="formm">
            <h1>Se connecter</h1>
            <form method="post" action="../controller/loginController.php">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pwd" placeholder="Mot de passe">
                <label for="remember"> remember me </label>
                <input type="checkbox" name="remember" id="remember">
                <button type="submit" name="conn">Se connecter</button>
            </form>
        </div>
    </div>
</body>

</html>