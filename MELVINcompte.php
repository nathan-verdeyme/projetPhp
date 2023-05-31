<!DOCTYPE html>
<html>
<head>
  <title>Mon compte SunWish</title>
  <style>

    *{
        margin: 0;
        padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-image: linear-gradient(rgba(82, 87, 85, 0.623),rgba(82, 87, 85, 0.623)),url(images/back2.jpg);
        background-position: center;
        background-size: cover;
    }

    header {
      background-color: rgba(82, 87, 85, 0.623);
      color: #fff;
      padding: 20px;
      text-align: center;
      height: 60px;
      opacity: 70%;

    }



    main {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .container {
      border: 2px solid #333;
      padding: 20px;
      width: 250px;
      height: 40vh;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    h1{
        position: relative;
        font-size: 20px;
        margin-top: 20px;


    }

  </style>
</head>
<body>
  <header>
    <h1>Bienvenue sur votre espace personnel vous pouvez consulter vos informations</h1>
  </header>

  <main>
    <h2>Personnel :</h2>
    <div class="container">
    <?php

    session_start();
    include_once("connexionBdd.php");
    $_SESSION['username'] = $_GET['username'] ;
    $_SESSION['idUser'] = $_GET['idUser'] ;
    if($_SESSION['username'] != "" && $_SESSION['idUser'] !="" ){
        $user = $_SESSION['username'];
        $idUser = $_SESSION['idUser'] ;
    }


      $requete_user = "SELECT * FROM user WHERE id_user = ?";
      $stmt = mysqli_prepare($conn, $requete_user);
      mysqli_stmt_bind_param($stmt, "s", $idUser);
      mysqli_stmt_execute($stmt);
      $resultat_user = mysqli_stmt_get_result($stmt);

      $infosUser = array();
		while ($row = mysqli_fetch_assoc($resultat_user)) {
		$infosUser[] = $row;
		}

    $requete_reservation = "SELECT r.*, h.nom_hotel from reservation r inner join hotel h on h.id_hotel = r.id_hotel where user=?";
      $stmt = mysqli_prepare($conn, $requete_reservation);
      mysqli_stmt_bind_param($stmt, "s", $idUser);
      mysqli_stmt_execute($stmt);
      $resultat_reservation = mysqli_stmt_get_result($stmt);

      $infosReservation = array();
		while ($row = mysqli_fetch_assoc($resultat_reservation)) {
		$infosReservation[] = $row;
    }
    ?>
    <ul>
      <?php foreach ($infosUser as $infoUser) { ?>



   <li><strong>Nom :</strong> <?php echo $infoUser['nom']; ?></li>
   <li><strong>Prénom :</strong> <?php echo $infoUser['username']; ?></li>
   <li><strong>Age :</strong> <?php echo $infoUser['age']; ?></li>

   <?php
    } ?>
    </ul>
    <p><strong>Reservation :</strong> </p>
    <?php


   if (mysqli_num_rows($resultat_reservation) > 0) {
    ?> <ul> <?php
    foreach( $infosReservation as $infoReservation){
    ?>
  <li><strong>Nom hotel :</strong> <?php echo  $infoReservation['nom_hotel']; ?></li>
   <li><strong>Date d'arrivée :</strong> <?php echo  $infoReservation['date_arrivee']; ?></li>
		<li><strong>Date de départ :</strong> <?php echo $infoReservation['date_depart']; ?></li>
		<?php
    }
  ?> </ul> <?php
  }else {
    ?>

    <p> Rien à afficher</p>
    <?php
  }
    ?>
    </div>

    <h2>Entreprise : </h2>
    <div class="container">
    <?php foreach ($infosUser as $infoUser) { ?>



    <li><strong>Entreprise :</strong> <?php echo $infoUser['entreprise']; ?></li>
    <?php } ?>
    </div>

    <h2> Préférences :</h2>
    <div class="container">
    <?php foreach ($infosUser as $infoUser) { ?>



    <li><strong>Lieu préféré :</strong> <?php echo $infoUser['lieu']; ?></li>
    <li><strong>Activité préférée :</strong> <?php echo $infoUser['activite']; ?></li>
    <strong>A VENIR ...
    <?php } ?>
    </div>
  </main>

  <footer>
    <p>© 2023 SunWish.com | Tous droits réservés.</p>
  </footer>
</body>
</html>
