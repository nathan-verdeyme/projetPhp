<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['mail'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $age = $_POST['age'];
    
    require_once('connexionBdd.php');
    // Requête d'insertion des données
    $requete = "INSERT INTO user (username, mail, password, age) VALUES (?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $requete );
				mysqli_stmt_bind_param($stmt1, "ssss", $nom, $email, $mot_de_passe, $age);
				mysqli_stmt_execute($stmt1);
                $resultat_req = mysqli_stmt_get_result($stmt1);
                echo $resultat_req;
    // Exécuter la requête
    if ($resultat_req) {
       
        echo "Erreur lors de l'inscription: " . mysqli_error($conn);
    } else {
        echo "Inscription réussie !";
        $_SESSION['username'] = $nom;
        header('Location: main.php');
    }
    
    // Fermer la connexion
    mysqli_close($connexion);
}
?>