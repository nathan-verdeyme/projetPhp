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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        *{
            margin: 0;
            padding: 0;
        }

        body{

            background-color: black;
            font-family: roboto;
        }

.uno{

    position: absolute;
    
    height: 600px;
    top: 0;
    left: 0px;
    background: linear-gradient(to bottom, #cde6f9, #85c4f7);
    border-radius: 10px;
    border: 2px solid #87CEEB;
    height: 100%;

}

.uno h1{
    
    position: relative;
    text-align: center;
    justify-content: center;
    position: center;
    margin-top: 0;
    color: white;
  font-weight: bold;
  border: 2px solid black;
  background-color: rgba(0, 0, 0, 0.6);
}

.uno h2{
    position: relative;
    text-align: center;
    justify-content: center;
    position: center;
    margin-top: 20px;
    color: white;
    font-weight: bold;
    border: 2px solid black;
    background-color: rgba(0, 0, 0, 0.6);
    width: 415px;
    margin-left: 12px;
    margin-right: 12px;

}

.uno p{

    justify-content: center;
    text-decoration: none;
    color: blue;
    text-align: justify;
    margin-left: 115px;
}


.center-button {
    display: block;
    margin: 0 auto;
    margin-top: 20px;
    font-weight: bold;
    width: 79px;
}

.trio{
    margin-top: 50px;
    border: 2px solid black;
    background-color: papayawhip;
    height: 280px;

}

.trio p {
    margin-top: 20px;
    font-weight: bold;

}

.segundo{
    position: absolute;
    margin-left: 480px;
    width: 789px;
    height: 100%;
    background-color: rgb(220,220,220);
    border: 2px solid rgb(189,183,107);
}

.cad{
    position: relative;
    margin-left: 40px;
    margin-top: 50px;
    border: 1px solid black;
    width: 700px;
    height: 500px;
}


.segundo h2{

    text-align: center;
    justify-content: center;
    color: white;
    background-color: black;

}



    </style>

</head>
<body>
<div class="uno">
    <h1>Réservation</h1>
    <h2>Récapitulatif de la réservation</h2>

    <div class="trio">
    <?php foreach ($hotelTab as $hotelTa){?>
    <p class="left"><strong>* Hôtel :</strong> <?php echo $hotelTa['nom_hotel']; ?></p>
    <?php } ?>
    <?php foreach ($chambres as $chambre){?>
    <p class="left"><strong>* Chambre :</strong> <?php echo $chambre['nom_categorie']; ?></p>
    <?php } ?>
    <p class="left"><strong>* Date de début :</strong> <?php echo $date_arrivee; ?></p>
    <p class="left"><strong>* Date de fin :</strong> <?php echo $date_depart; ?></p>
    <p class="left"><strong>* Prix total :</strong> <?php echo $prix_total; ?> €</p>
    </div>
    <form action="paiement.php" method="post">
        <input type="hidden" name="reservation_id" value="">
        <input type="submit" value="Payer" class="center-button">
</div>

<div class="segundo">

<h2>Consulter directement les informations de l'hôtel</h2>

<div class="cad">
<?php foreach ($hotelTab as $hotelTa){ ?>
<img src="<?php echo $hotelTa['image']; ?>" width="700" height="500">
<?php } ?>
</div>
</div>

</body>

</html>