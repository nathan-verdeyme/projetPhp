<html>
<head>
<meta charset="utf-8">
<!-- importer le fichier de style -->
<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var timer;

        $('#nom_ville').keyup(function(){
            clearTimeout(timer);
            var query = $(this).val();

            if (query === '') {
                $('#search-results').empty(); // Clear the search results
            } else {
                timer = setTimeout(function() {
                    $.ajax({
                        url: 'autocompletion.php',
                        method: 'POST',
                        data: {query: query, type: 'nom_ville'}, // Specify the type for the autocompletion
                        success: function(response){
                            $('#search-results').html(response);
                        }
                    });
                }, 30);
            }
        });

        $('#nom_activite').keyup(function(){
            clearTimeout(timer);
            var query = $(this).val();

            if (query === '') {
                $('#search-resultes').empty(); // Clear the search results
            } else {
                timer = setTimeout(function() {
                    $.ajax({
                        url: 'autocompletion.php',
                        method: 'POST',
                        data: {query: query, type: 'nom_activite'}, // Specify the type for the autocompletion
                        success: function(response){
                            $('#search-resultes').html(response);
                        }
                    });
                }, 30);
            }
        });

        $('#search').keypress(function(event) {
            if (event.which == 13) { // Enter key pressed
                var query = $(this).val();
                window.location.href = 'resultat.php?query=' + query; // Redirect to result.html with query parameter
                return false; // Prevent form submission
            }
        });
    });
</script>
<style>
    .container {
        max-width: 500px;
        margin: 100px auto;
    }

    .search-container {
        position: relative;
    }

    .search-icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        color: #888;
    }

    .result-item {
        display: block;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
    }

    .result-item:hover {
        background-color: #e9ecef;
    }
    

</style>
</head>
<body style='background:#fff;'>
<div id="content">
    <!-- tester si l'utilisateur est connecté -->
    <?php
    session_start();
    ?>

    <div class="user-widget">
        <?php
        if (!isset($_SESSION['username']) && !isset($_SESSION['idUser']) ) {
         ?>
            <button type="button" onclick="window.location='FINALmenu.php'">Retour à l'accueil</button>
           <?php 
        } else {
            $user = $_SESSION['username'];
            $iduser = $_SESSION['idUser'];
            $currentDate = date("Y-m-d");
        ?>
        <h2>RECHERCHE D'ETABLISSEMENTS HÔTELIERS</h2>
        <form method="POST" action="recherche.php" style="text-align: center;">
  <label for="ville">Ville :</label>
  <input type="text" name="nom_ville" id="nom_ville" style="margin-bottom: 10px;"><br>
  <i class="fas fa-search search-icon"></i>
  <div id="search-results"></div>

  <label for="date_arrivee">Date d'arrivée :</label>
  <input type="date" name="date_arrivee" id="date_arrivee" min="<?php echo $currentDate; ?>" style="margin-bottom: 10px;"><br>

  <label for="date_depart">Date de départ :</label>
  <input type="date" name="date_depart" id="date_depart" onchange="updateMinDate()" style="margin-bottom: 10px;"><br>

  <label for="activite">Activité recherchée :</label>
  <input type="text" name="nom_activite" id="nom_activite" style="margin-bottom: 10px;"><br>
  <i class="fas fa-search search-icon"></i>
  <div id="search-results"></div>

  <label for="price">Sélectionnez un prix maximal :</label>
  <input type="range" name="price" id="price" min="0" max="1000" step="10" value="50" style="margin-bottom: 10px;">
  <output class="price-output" for="price"></output>

  <input type="submit" value="Rechercher" style="background-color: #2980B9; color: white; padding: 10px 20px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">
</form>

        <?php
        }

        ?>

    </div>
</div>
<script>
     function updateMinDate() {
        var date_depart = document.getElementById("date_arrivee").value;
        document.getElementById("date_depart").min = date_depart;
    }
        const price = document.querySelector('#price');
        const output = document.querySelector('.price-output');

        output.textContent = price.value;

        price.addEventListener('input', function() {
            output.textContent = price.value;
        });
    </script>
</body>
</html>