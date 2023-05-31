<html>
<head>
<meta charset="utf-8">
<!-- importer le fichier de style -->
<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
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

    if($_SESSION['username'] != ""){
        $user = $_SESSION['username'];
        // afficher un message
        echo "Bonjour $user, vous êtes connecté";
    ?>
    <h2>Recherche d'établissements hôteliers</h2>
    <form method="POST" action="recherche.php">
        <label for="ville">Ville :</label>
        <input type="text" name="nom_ville" id="nom_ville"><br>
        <i class="fas fa-search search-icon"></i>
        <div id="search-results"></div>
        <label for="date_arrivee">Date d'arrivée :</label>
        <input type="date" name="date_arrivee" id="date_arrivee"><br>
        <label for="date_depart">Date de départ :</label>
        <input type="date" name="date_depart" id="date_depart"><br>
        <label for="activite">Activité recherchée :</label>
        <input type="text" name="nom_activite" id="nom_activite"><br>
        <i class="fas fa-search search-icon"></i>
        <div id="search-resultes"></div>
        <label for="price">Sélectionnez un prix maximal : </label>
        <input type="range" name="price" id="price" min="0" max="1000" step="10" value="50">
        <output class="price-output" for="price"></output>
        <input type="submit" value="Rechercher">
    </form>
    <?php
    }
    ?>
   
    <div class="user-widget">
        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] !== null) {
            header("Location: FINALmenu.php");
        } else {
        ?>
        <h2>Recherche d'établissements hôteliers</h2>
        <form method="POST" action="recherche.php">
            <label for="ville">Ville :</label>
            <input type="text" name="nom_ville" id="nom_ville"><br>
            <i class="fas fa-search search-icon"></i>
            <div id="search-results"></div>
            <label for="date_arrivee">Date d'arrivée :</label>
            <input type="date" name="date_arrivee" id="date_arrivee"><br>
            <label for="date_depart">Date de départ :</label>
            <input type="date" name="date_depart" id="date_depart"><br>
            <label for="activite">Activité recherchée :</label>
            <input type="text" name="nom_activite" id="nom_activite"><br>
            <i class="fas fa-search search-icon"></i>
            <div id="search-resultes"></div>
            <label for="price">Sélectionnez un prix maximal : </label>
            <input type="range" name="price" id="price" min="0" max="1000" step="10" value="50">
            <output class="price-output" for="price"></output>
            <input type="submit" value="Rechercher">
        </form>
        <?php
        }
        
        ?>

    </div>
</div>
<script>
        const price = document.querySelector('#price');
        const output = document.querySelector('.price-output');

        output.textContent = price.value;

        price.addEventListener('input', function() {
            output.textContent = price.value;
        });
    </script>
</body>
</html>
