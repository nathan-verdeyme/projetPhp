<head>
	<title>Paiement</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<h1>Paiement</h1>
    
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
</form>
	<form action="confirmation.php" method="post">
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
</body>
</html>

