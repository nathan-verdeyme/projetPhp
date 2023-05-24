<!DOCTYPE html>
<html>
<head>
	<title>Hôtel</title>
</head>
<body>
	<?php
	session_start();

	$hoteldefinis = $_SESSION['hotels'];
	$date_arrivee = $_SESSION['date_arrivee'];
	$date_depart = $_SESSION['date_depart'];
		// Récupération de l'ID de l'hôtel sélectionné
		$id_hotel = $_GET['id'];
		$_SESSION['id_hotelChoisi'] = $_GET['id'];
$user = $_SESSION['username'];
		// Connexion à la base de données
		include('connexionBdd.php');

		// Récupération des informations de l'hôtel
		$requete_hotel = "SELECT * FROM hotel WHERE id_hotel = ?";
		$stmt = mysqli_prepare($conn, $requete_hotel);
		mysqli_stmt_bind_param($stmt, "s", $id_hotel);
		mysqli_stmt_execute($stmt);
		$resultat_hotel = mysqli_stmt_get_result($stmt);

		$hotels = array();
		while ($row = mysqli_fetch_assoc($resultat_hotel)) {
		$hotels[] = $row;
		}
		// Récupération des informations des activités de l'hôtel
		$requete_activites = "SELECT * FROM activite WHERE id_hotel = ?";
		$stmt1 = mysqli_prepare($conn, $requete_activites);
		mysqli_stmt_bind_param($stmt1, "s", $id_hotel);
		mysqli_stmt_execute($stmt1);
		$resultat_activites = mysqli_stmt_get_result($stmt1);

		$activites = array();
		while ($row = mysqli_fetch_assoc($resultat_activites)) {
		$activites[] = $row;
		}

		// Récupération des informations des chambres de l'hôtel
		$requete_chambres = "SELECT * FROM chambre c WHERE c.hotel = ?";
		$stmt2 = mysqli_prepare($conn, $requete_chambres);
		mysqli_stmt_bind_param($stmt2, "s", $id_hotel);
		mysqli_stmt_execute($stmt2);
		$resultat_chambres = mysqli_stmt_get_result($stmt2);

		$chambres = array();
		while ($row = mysqli_fetch_assoc($resultat_chambres)) {
		$chambres[] = $row;
		}
	?>
	<?php foreach ($hotels as $hotell): ?>
	<h1><?php echo $hotell['nom_hotel']; ?></h1>

	<h2>Description</h2>
	<p><?php echo $hotell['description_hotel']; ?></p>

	<h2>Adresse</h2>
	<p><?php echo $hotell['adresse_hotel']; ?></p>
	<?php endforeach; ?>
	<h2>Activités</h2>
	<?php foreach ($activites as $activite): ?>
		<p><?php echo $activite['nom_activite']; ?></p>
	<?php endforeach; ?>

	<h2>Chambres</h2>
	<table>
		<tr>
			<th>Catégorie</th>
			<th>Tarif</th>
			<th>Réserver</th>
		</tr>
		<?php foreach ($chambres as $chambre): ?>
			<tr>
				<td><?php echo $chambre['nom_categorie']; ?></td>
				<td><?php echo $chambre['tarif_chambre']; ?>€/nuit</td>
				<td><a href = "reservation.php?id_chambre=<?php echo $chambre['id_chambre']; ?>"><button>Réserver</button></a></td>
			</tr>
		<?php endforeach; ?>
	</table>


</body>
</html>
