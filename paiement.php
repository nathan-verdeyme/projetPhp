<head>
	<title>Paiement</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

		*{
			margin: 0;
			padding: 0;
		}

		h1{
			color: white;
			background-color: #87CEEB;
		}
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(to bottom, #FF6B6B, #FF8E53);
		font-family: Roboto;
    }

    .scroll-container {
        max-height: 80vh;
        overflow-y: auto;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 300px;
        padding: 20px;
        background: linear-gradient(to bottom, #FFFFFF, #F5F5F5);
        border-radius: 10px;
        border: 2px solid #87CEEB;
		position: absolute;
		right: 235px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        color: #87CEEB;
    }

    input[type="text"],
    input[type="month"] {
        padding: 8px;
        width: 100%;
        border-radius: 5px;
        border: 2px solid #87CEEB;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background: linear-gradient(to bottom, #FF8E53, #FF6B6B);
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: linear-gradient(to bottom, #FF6B6B, #FF8E53);
    }

	.try{
		width: 600px;
		height: 500px;
		position: absolute;
		
		background-color: #FF6B6B;
		border: 1px solid black;
		justify-content: center;
		justify-items: center;
		text-align: center;
		opacity: 80%;
		left: 50px;
		
        border-radius: 10px;
        border: 2px solid #87CEEB;
		
	}

	.try p{

		color: white;
		font-weight: bold;
		margin-top: 45px;
		justify-content: center;
		text-align: justify;
		margin-left: 25px;

	}

	.feu{
		width: 180px;
		height: 100%;
		right: 0px;
		position: absolute;
		top:0;
	}
</style>
</head>
<body>
<?php	session_start();
include_once("ConnexionBdd.php");
$user = $_SESSION['username'];
$hotels = $_SESSION['hotels'];
$hotel_id= $_SESSION['id_hotelChoisi'];
$date_arrivee = $_SESSION['date_arrivee'];
$date_depart = $_SESSION['date_depart'];
$chambre_id = $_SESSION['id_chambre'];
$idUser = $_SESSION['idUser'];
            ?>

<div class="try">
	<h1>PAIEMENT</h1>
    
	<p>Veuillez saisir les informations de paiement ci-dessous :</p>
	<?php 
	$requete_user = "SELECT * FROM user WHERE id_user = ?";
      $stmt = mysqli_prepare($conn, $requete_user);
      mysqli_stmt_bind_param($stmt, "s", $idUser);
      mysqli_stmt_execute($stmt);
      $resultat_user = mysqli_stmt_get_result($stmt);

      $infosUser = array();
		while ($row = mysqli_fetch_assoc($resultat_user)) {
		$infosUser[] = $row;
		}
		foreach ($infosUser as $infoUser){
		?>
	<p> Entreprise : <?php echo $infoUser["entreprise"]; ?> </p>

    <p> Nom : <?php echo $infoUser['nom']; ?></p>
    <p> Prénom : <?php echo $user; ?></p>

    <p>Mail : <?php echo $infoUser['mail']; ?></p>
	</div>

<?php


} 
?>
<form method="post" action="confirmation.php">
    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" required><br><br>

    <label for="code_postal">Code postal :</label>
    <input type="text" id="code_postal" name="code_postal" required><br><br>

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" required><br><br>

	
		<label for="nom">Nom sur la carte :</label>
		<input type="text" id="nom" name="nom" required><br><br>

		<label for="numero">Numéro de carte :</label>
		<input type="text" id="numero" name="numero" required><br><br>

		<label for="expiration">Date d'expiration :</label>
		<input type="month" id="expiration" name="expiration" required><br><br>

		<label for="cvv">CVV :</label>
		<input type="text" id="cvv" name="cvv" required><br><br>

		<input type="submit" value="Payer">
	</form>

	<img src="feu.jpg" class="feu">
</body>
</html>

