<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Confirmation de la réservation</title>
</head>
<body>
	<h1>Confirmation de la réservation</h1>
<?php	session_start();

require_once('connexionBdd.php');
	            $hotels = $_SESSION['hotels'];
	            $date_arrivee = $_SESSION['date_arrivee'];
	            $date_depart = $_SESSION['date_depart'];
	            $chambre_id =	$_SESSION['id_chambre'];
				$user = $_SESSION['username'];
				$prix_total = $_SESSION['prix_total'];
				$hotel_id= $_SESSION['id_hotelChoisi']; 
				
				$userId = "SELECT id_user from user where username = ? ";
				$stmt = mysqli_prepare($conn, $userId);
				mysqli_stmt_bind_param($stmt, "s", $user);
				mysqli_stmt_execute($stmt);
				$resultat_user = mysqli_stmt_get_result($stmt);
		
		$resulUser =array();
        while ($row = mysqli_fetch_assoc($resultat_user)) {
            $resulUser[] = $row;
            }
			$resulUserFt = $resulUser[0];
			$id=$resulUserFt['id_user'];
	

					
				$reservation = "INSERT INTO reservation (date_arrivee,date_depart, user,id_chambre, prix_total, id_hotel) VALUES(?,?,?,?,?,?)";
				$stmt1 = mysqli_prepare($conn, $reservation );
				mysqli_stmt_bind_param($stmt1, "ssisis", $date_arrivee, $date_depart, $id, $chambre_id, $prix_total,$hotel_id);
				mysqli_stmt_execute($stmt1);
							
$hotelR = "SELECT * FROM hotel WHERE id_hotel = ?";
$stmt = mysqli_prepare($conn, $hotelR);
		mysqli_stmt_bind_param($stmt, "s", $hotelRempli);
		mysqli_stmt_execute($stmt);
		$resultat_hotel = mysqli_stmt_get_result($stmt);
        $hotelTab =array();
        while ($row = mysqli_fetch_assoc($resultat_hotel)) {
            $hotelTab[] = $row;
            }
			

$chambreR = "SELECT * FROM chambre WHERE id_chambre = ?";
$stmt1 = mysqli_prepare($conn, $chambreR);
		mysqli_stmt_bind_param($stmt1, "s",$chambre_id);
		mysqli_stmt_execute($stmt1);
		$resultat_chambre = mysqli_stmt_get_result($stmt1);
        $chambres = array();
		while ($row = mysqli_fetch_assoc($resultat_chambre)) {
		$chambres[] = $row;
		}
		?>
	<p>Merci pour votre réservation ! Veuillez vérifier les informations suivantes :</p>

	<ul>
		<?php foreach ($hotelTab as $hotel){ ?>
		<li><strong>Nom de l'hôtel :</strong> <?php echo $hotel['nom_hotel']; ?></li>
		<li><strong>Description de l'hôtel :</strong> <?php echo $hotels['description_hotel']; ?></li>
		<?php } ?>
		<li><strong>Date d'arrivée :</strong> <?php echo $date_arrivee; ?></li>
		<li><strong>Date de départ :</strong> <?php echo $date_depart; ?></li>
		<?php 
		foreach ($chambres as $chambre) { ?>
		<li><strong>Nom de la chambre :</strong> <?php echo $chambre['nom_categorie']; ?></li>
		<li><strong>Tarif de la chambre :</strong> <?php echo $chambre['tarif_chambre']; ?></li>
		<?php } ?>
	</ul>
</body>
</html>
