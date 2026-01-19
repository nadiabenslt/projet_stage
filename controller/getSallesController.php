<?php 

require_once __DIR__.'/../model/Salle.php';

$salle=new Salle();
$salles=$salle->getSalles();
