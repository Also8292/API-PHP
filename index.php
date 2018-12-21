<?php

header('Content-Type: application/json');

try {
    $connexion = new PDO('mysql:host=localhost;dbname=api_db;charset=utf8','root','');
    $retour["success"] = true;
    $retour["message"] = "Connexion à la base de données réussie";
}
catch(Exception $ex) {
    $retour["success"] = false;
    $retour["message"] = "Erreur de connexion à la base de données";
}

$request = $connexion->prepare("SELECT * FROM etudiants");
$request->execute();

$resultat = $request->fetchAll();

$retour["message"] = "Voici les étudiants";
$retour["resultats"]["etudiants"] = $resultat;

echo json_encode($retour);







