<?php
// inclusion du fichier de connexion
require_once('connexionBdd.php');
// vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // récupération des données du formulaire


    $ville = isset($_POST['ville']) ? $_POST['ville'] : null;
    $activite = isset($_POST['activite']) ? $_POST['activite'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $date_arrivee = isset($_POST['date_arrivee']) ? $_POST['date_arrivee'] : null;
    $date_depart = isset($_POST['date_depart']) ? $_POST['date_depart'] : null;
  } else {
      header("Location: main.php"); // Redirection vers la page d'accueil si les données sont incorrectes
      exit();
  }

// préparation de la requête SQL pour récupérer les hôtels en fonction des critères de recherche
$sql = "SELECT * FROM hotel
        INNER JOIN chambre ON hotel.id_hotel = chambre.hotel
        INNER JOIN ville ON hotel.id_ville = ville.id_ville
        INNER JOIN pays ON ville.id_pays = pays.id_pays
        INNER JOIN activite ON hotel.id_ville = activite.id_ville
        WHERE ville.nom_ville = ?
        AND (activite.nom_activite = ? OR ? IS NULL)
    AND (chambre.tarif_chambre BETWEEN 0 AND ? OR ? IS NULL)
    AND NOT EXISTS (
        SELECT *
        FROM reservation
        WHERE
            reservation.id_chambre = chambre.id_chambre
            AND (
                (? BETWEEN reservation.date_arrivee AND reservation.date_depart)
                OR (? BETWEEN reservation.date_arrivee AND reservation.date_depart)
                OR (? IS NULL AND ? IS NULL)
            )
    )";
        $stmt = mysqli_prepare($conn, $sql);
           mysqli_stmt_bind_param($stmt, "sssssssss", $ville,$activite, $activite,$price, $price, $date_arrivee, $date_depart, $date_arrivee, $date_depart);
           mysqli_stmt_execute($stmt);
           $result = mysqli_stmt_get_result($stmt);

           $hotels = array();
while ($row = mysqli_fetch_assoc($result)) {
    $hotels[] = $row;
}
session_start();
$_SESSION['ville'] = $ville;
$_SESSION['date_arrivee'] = $date_arrivee;
$_SESSION['date_depart'] = $date_depart;
$_SESSION['activite'] = $activite;
$_SESSION['hotels'] = $hotels;
$_SESSION['price']= $price;
 $_SESSION['username'] = $user;

$user = $_SESSION['username'];
 // Redirection vers la page de résultat avec les données de la recherche en paramètres d'URL
 header("Location: resultatRecherche.php?ville=$ville&date_arrivee=$date_arrivee&date_depart=$date_depart&activite=$activite");
 exit();
?>
       <!DOCTYPE html>
       <html>
       <head>
       	<title>Recherche d'hôtels</title>
       	<meta charset="utf-8">
       </head>
       <body>
       	<h1>Recherche d'hôtels</h1>
       	<form action="" method="GET">
       		<label for="ville">Ville : </label>
       		<input type="text" name="ville" id="ville" required>
       		<br>
       		<label for="date_arrivee">Date d'arrivée : </label>
       		<input type="date" name="date_arrivee" id="date_arrivee" required>
       		<br>
       		<label for="date_depart">Date de départ : </label>
       		<input type="date" name="date_depart" id="date_depart" required>
       		<br>
       		<label for="activite">Activité : </label>
       		<input type="text" name="activite" id="activite" required>
       		<br>
       		<input type="submit" value="Rechercher">
       	</form>
       </body>
       </html>