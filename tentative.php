<!DOCTYPE html>
<html>
<head>
    <title>Informations de l'utilisateur</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }
        
        table {
            border-collapse: collapse;
            width: 400px;
            max-width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffe6e6;
            margin-bottom: 20px;
        }
        
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        
        table th {
            background-color: #ff0000;
            color: #fff;
            font-weight: bold;
        }
        
        table tr:nth-child(even) {
            background-color: #ffd9d9;
        }
        
        table tr:hover {
            background-color: #ffc2c2;
        }
        
        .button-container {
            margin-top: 100px;
        }
        
        .action-button {
            padding: 10px 20px;
            background-color: #4286f4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    // Informations de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motDePasse = "";
    $nomBaseDeDonnees = "findemai";

    // Connexion à la base de données
    $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

    // Vérifier si la connexion a réussi
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Récupérer les informations de l'utilisateur ayant l'ID 1
    $utilisateurId = 1;

    // Vérifier si le bouton a été cliqué
    if (isset($_POST['afficher'])) {
        // Préparer la requête SQL pour récupérer les informations de l'utilisateur
        $requete = "SELECT name, surname, age FROM utilisateur WHERE id = $utilisateurId";

        // Exécuter la requête SQL
        $resultat = mysqli_query($connexion, $requete);

        // Vérifier si la requête a réussi
        if ($resultat && mysqli_num_rows($resultat) > 0) {
            // Récupérer les données de l'utilisateur
            $row = mysqli_fetch_assoc($resultat);

            // Assigner les données à des variables
            $name = $row['name'];
            $surname = $row['surname'];
            $age = $row['age'];

            // Afficher les informations
            echo '
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                </tr>
                <tr>
                    <td>'.$name.'</td>
                    <td>'.$surname.'</td>
                    <td>'.$age.'</td>
                </tr>
            </table>';
        } else {
            die("Aucune information d'utilisateur n'a été trouvée.");
        }

        // Fermer le résultat de la requête
        mysqli_free_result($resultat);
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);
    ?>

    <div class="button-container">
        <form method="post">
            <input type="submit" class="action-button" name="afficher" value="Afficher les informations">
        </form>
    </div>
</body>
</html>
