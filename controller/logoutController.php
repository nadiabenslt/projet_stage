<?php 

session_start();
session_destroy();
setcookie("role", "", time() - 1); // Supprime le cookie

header("Location: ../view/index.php");
