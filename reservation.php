<?php

session_start();

            $hotels = $_SESSION['hotels'];
            $date_arrivee = $_SESSION['date_arrivee'];
            $date_depart = $_SESSION['date_depart'];
            $chambre_id = $_GET['id_chambre'];
            $hotel_id= $_SESSION['id_hotelChoisi'];
$user = $_SESSION['username'];
			




// Vérification de la validité des informations de la réservation

// Connexion à la base de données
require_once('connexionBdd.php');
$hotelRempli =0;
foreach($hotels as $hotelsss){
    $hotelRempli = $hotelsss['id_hotel'];
}

// Récupération des informations de l'hôtel
$hotelR = "SELECT * FROM hotel WHERE id_hotel = ?";
$stmt = mysqli_prepare($conn, $hotelR);
		mysqli_stmt_bind_param($stmt, "s", $hotelRempli);
		mysqli_stmt_execute($stmt);
		$resultat_hotel = mysqli_stmt_get_result($stmt);
        $hotelTab =array();
        while ($row = mysqli_fetch_assoc($resultat_hotel)) {
            $hotelTab[] = $row;
            }

// Récupération des informations de la chambre
$chambreR = "SELECT * FROM chambre WHERE id_chambre = ?";
$stmt1 = mysqli_prepare($conn, $chambreR);
		mysqli_stmt_bind_param($stmt1, "s",$chambre_id);
		mysqli_stmt_execute($stmt1);
		$resultat_chambre = mysqli_stmt_get_result($stmt1);
        $chambres = array();
		while ($row = mysqli_fetch_assoc($resultat_chambre)) {
		$chambres[] = $row;
		}

        function diff($start_date, $end_date) {
            $start = strtotime($start_date);
            $end = strtotime($end_date);
            $diff = $end - $start;
            return floor($diff / (60*60*24));
        }
// Calcul du prix total de la réservation
$nb_nuits  = diff($date_arrivee, $date_depart);
foreach($chambres as $chambre){
$prix_total = $nb_nuits * $chambre['tarif_chambre'];
}
$_SESSION['id_chambre']= $chambre_id;
$_SESSION['prix_total'] = $prix_total;
// Enregistrement de la réservation dans la base de données


// Affichage des informations de la réservation
?>

<!DOCTYPE html>
<html>
<head>
    <title>Réservation effectuée</title>
</head>
<body>
    <h1>Réservation</h1>
    <h2>Récapitulatif de la réservation :</h2>
    <?php foreach ($hotelTab as $hotelTa){?>
    <p><strong>Hôtel :</strong> <?php echo $hotelTa['nom_hotel']; ?></p>
    <?php } ?>
    <?php foreach ($chambres as $chambre){?>
    <p><strong>Chambre :</strong> <?php echo $chambre['nom_categorie']; ?></p>
    <?php } ?>
    <p><strong>Date de début :</strong> <?php echo $date_arrivee; ?></p>
    <p><strong>Date de fin :</strong> <?php echo $date_depart; ?></p>
    <p><strong>Prix total :</strong> <?php echo $prix_total; ?> €</p>
    <form action="paiement.php" method="post">
        <input type="hidden" name="reservation_id" value="">
        <input type="submit" value="Payer">
