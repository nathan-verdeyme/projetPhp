<head>
	<title>Paiement</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php	session_start();

$user = $_SESSION['username'];
$hotels = $_SESSION['hotels'];
$hotel_id= $_SESSION['id_hotelChoisi'];
$date_arrivee = $_SESSION['date_arrivee'];
$date_depart = $_SESSION['date_depart'];
$chambre_id = $_SESSION['id_chambre'];
            ?>

	<h1>Paiement</h1>
    
	<p>Veuillez saisir les informations de paiement ci-dessous :</p>

<form method="post" action="confirmation.php">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="email">Adresse email :</label>
    <input type="email" id="email" name="email" required><br><br>

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

