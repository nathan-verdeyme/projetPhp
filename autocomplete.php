<?php
  include_once("connexionBdd.php");

// Récupération du type de recherche (ville ou activité)
$type = $_GET['type'];

// Requête SQL pour récupérer les suggestions
if ($type == 'ville') {
    $query = "SELECT nom_ville FROM ville WHERE nom_ville LIKE :term LIMIT 10";
} elseif ($type == 'activite') {
    $query = "SELECT nom_activite FROM activite WHERE nom_activite LIKE :term LIMIT 10";
}

$term = $_GET['term'] . '%';

$stmt = $bdd->prepare($query);
$stmt->bindParam(':term', $term);
$stmt->execute();

// Récupération des suggestions dans un tableau
$suggestions = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $suggestions[] = $row[$type];
}

// Encodage en JSON et envoi des suggestions
echo json_encode($suggestions);
?>
