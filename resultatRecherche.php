
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Résultats de la recherche</title>
	<link rel="stylesheet" href="resultatRecherche.css">
</head>
<body>
	<header>
		<h1>Résultats de la recherche</h1>
		<nav>
			<ul>
				<li><a href="main.php">Nouvelle recherche</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<?php
    require_once('connexionBdd.php');

    session_start();
		
			$user = $_SESSION['username'];
            $hotels = $_SESSION['hotels'];
            $date_arrivee = $_SESSION['date_arrivee'];
            $date_depart = $_SESSION['date_depart'];
			$price = $_SESSION['price'];

            // Vérification s'il y a des résultats
            if(count($hotels) > 0) {
				// Parcours des résultats
				foreach($hotels as $hotel) {
              ?>  <tr>
                    <td><img src="<?php echo $hotel['image']; ?>" width="100" height="100"></td>
                    <td><?php echo $hotel['nom_hotel']; ?></td>
                    <td><?php echo $hotel['adresse_hotel']; ?></td>
                    <td><?php echo $hotel['description_hotel']; ?></td>
                      <td><?php echo $hotel['NbEtoile_classe']; ?> étoiles </td>
                    <td><a href="hotel.php?id=<?php echo $hotel['id_hotel']; ?>">Voir les détails</a></td>

                <?php
              }
            					echo "<h3>Chambres disponibles :</h3>";

					// Requête pour récupérer les chambres de l'hôtel
					$req_chambres = "SELECT c.nom_categorie, c.tarif_chambre FROM chambre c WHERE c.hotel = ? AND c.tarif_chambre <= ?  AND c.id_chambre NOT IN ( SELECT r.id_chambre FROM reservation r WHERE r.date_arrivee <= ? AND r.date_depart >= ? )";
          $stmt = mysqli_prepare($conn, $req_chambres);
             mysqli_stmt_bind_param($stmt, "ssss", $hotel['id_hotel'],$price, $date_arrivee, $date_depart);
             mysqli_stmt_execute($stmt);
             $resultat_chambres = mysqli_stmt_get_result($stmt);
          $chambres = array();
       while ($row = mysqli_fetch_assoc($resultat_chambres)) {
       $chambres[] = $row;
       }
					// Vérification de la présence de chambres disponibles
					if (count($chambres) > 0) {
						foreach ($chambres as $chambre) {
							echo "<article>";
							echo "<h4>{$chambre['nom_categorie']}</h4>";
							echo "<p>Tarif : {$chambre['tarif_chambre']} €</p>";
							echo "</article>";
					}
        } else {
						echo "<p>Aucune chambre disponible pour ces dates.</p>";
					}
					echo "</tr>";
      }
         else {
				echo "<p>Aucun résultat ne correspond à votre recherche.</p>";
			}
		?>
	</main>
</body>
</html>