<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 session_start();
 
 if($_SESSION['username'] != ""){
    $user = $_SESSION['username'];
 // afficher un message
 echo "Bonjour $user, vous êtes connecté";

 
 ?>

 <h2>Recherche d'établissements hôteliers</h2>
 <form method="POST" action="recherche.php">
   <label for="ville">Ville :</label>
   <input type="text" name="ville"><br>
   <label for="date_arrivee">Date d'arrivée :</label>
   <input type="date" name="date_arrivee"><br>
   <label for="date_depart">Date de départ :</label>
   <input type="date" name="date_depart"><br>
   <label for="activite">Activité recherché :</label>
   <input type="text" name="activite"><br>
   <label for="price">Sélectionnez un prix maximal : </label>
   <input type="range" name="price" id="price" min="0" max="500" step="10" value="50">
   <output class="price-output" for="price"></output>
   <input type="submit" value="Rechercher">
 </form>
 <?php
 }


 ?>
 <script>
  const price = document.querySelector('#price');
const output = document.querySelector('.price-output');

output.textContent = price.value;

price.addEventListener('input', function() {
  output.textContent = price.value;
});
</script>
 <div class="user-widget">

 <?php if( isset($_SESSION['username']) && $_SESSION['username'] !== null ) { 
    //session_destroy();?>
   <a href="menu.php">Se déconnecter</a>
 <?php }else { ?>

 <?php } ?>
</div>
 </div>
 </body>
</html>
