<!DOCTYPE html>
<html>
<head>
  <style>
    /* Style de la barre d'outils */
    .toolbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: skyblue;
      padding: 10px;
    }
    
    /* Style des liens dans la barre d'outils */
    .toolbar a {
      padding: 5px 10px;
      margin-right: 10px;
      color: #333;
      text-decoration: none;
      font-weight: bold;
    }
    
    .toolbar a:hover {
      color: white; /* Couleur au survol */
    }
    
    /* Style de la barre de recherche */
    .search-bar {
      margin-top: 10px;
    }
    
    /* Style du champ de recherche */
    .search-bar input[type="text"] {
      padding: 5px;
      width: 300px;
      border-radius: 5px; /* Coins arrondis */
    }
    
    /* Style du bouton de recherche */
    .search-bar input[type="submit"] {
      padding: 5px 10px;
      border-radius: 5px; /* Coins arrondis */
      background-color: #333;
      color: #fff;
      border: none;
    }
    
    /* Style du contenu pour le décalage */
    .content {
      margin-top: 60px; /* Hauteur de la barre d'outils + marge */
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="toolbar">
    <a href="login.php">LOGIN</a>
    <a href="#">COMPTE</a>
    <a href="main.php">VOYAGES</a>
    <div class="search-bar">
      <form>
        <input type="text" placeholder="Rechercher...">
        <input type="submit" value="Rechercher">
      </form>
    </div>
  </div>
  
  <div class="content">
    <!-- Contenu de la page -->
  </div>
</body>
</html>


<?php
// Fermer la connexion
include_once("connexionBdd.php");
mysqli_close($conn);
?>