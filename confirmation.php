<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Confirmation de la réservation</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

		*{
            margin: 0px;
            padding: 0px;
            font-family: Roboto;
        }

		.exa{
			position: relative;
			margin-top: 100px;
			left:34%;
		}

		button{
			position: relative;
			margin-top: 100px;
			left:35%;
			width: 180px;
            color: #000;
            font-size: 12px;
            padding: 12px 0;
            background: #fff;
            border: 3px solid black;
            border-radius: 20px;
            outline: none;
            font-family: poppins;
            font-weight: bold;
			
		}

		h1{
			position: relative;
			top:30px;
			left:24%;
			font-weight: bold;
			color: white;
		}

		body{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(voy.jpg);
            background-position: center;
            background-size: cover;
            padding-left: 12%;
            padding-right: 6%;
            box-sizing: border-box;
            
            min-height: 100vh;
        }	
		

		p{
			color: white;
			font-weight: bold;
			margin-top: 30px;

		}

		ul{
			position: relative;
			margin-top: 100px;
			color: white;
			font-weight: bold;
			margin-top: 30px;

		}

		li{
			color: white;
			font-weight: bold;
			margin-top: 30px;

		}

		a{
			color: white;
			font-weight: bold;
			margin-top: 30px;

		}


		
	</style>
</head>
<body>
	<div class="container">
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
				$id = $_SESSION['idUser'];
				
					
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
	
	<div class="exa">

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

		</div>
	<button type="button" onclick="window.location='FINALmenu.php?username=<?php echo $user ?>&idUser=<?php echo $id ?>'">Retour à l'accueil</button>
		</div>

</body>
</html>
