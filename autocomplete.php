<?php
include_once("connexionBdd.php");

$query = $_POST['query'];
$type = $_POST['type']; // Retrieve the type from the AJAX request

// Perform the search in the database
if ($type == 'nom_ville') {
    $query1 = "SELECT nom_ville FROM ville WHERE nom_ville LIKE '%".$query."%'";
} elseif ($type == 'nom_activite') {
    $query1 = "SELECT nom_activite FROM activite WHERE nom_activite LIKE '%".$query."%'";
}
$result = $conn->query($query1);

// Display the search results
$count = 0;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>".$row[$type]."</p>";
        $count++;
        if ($count === 3) {
            break;
        }
    }
} else {
    echo "<p>Aucun résultat.</p>";
}
?>
