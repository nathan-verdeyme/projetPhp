<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $age = $_POST['age'];
    $nom = $_POST['prenom'];
    $activite = $_POST['activite'];
    $lieu = $_POST['lieu'];
    $entreprise = $_POST['entreprise'];

    $mot_de_passe_chiffre = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    
    require_once('connexionBdd.php');
    // Requête d'insertion des données
    $requete = "INSERT INTO user (username, mail, password, age, entreprise, lieu, activite, nom) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $requete );
				mysqli_stmt_bind_param($stmt1, "ssssssss", $prenom, $mail, $mot_de_passe_chiffre, $age, $entreprise, $lieu,$activite, $nom);
				mysqli_stmt_execute($stmt1);
                $resultat_req = mysqli_stmt_get_result($stmt1);
                echo $resultat_req;
    // Exécuter la requête
    if ($resultat_req) {
       
        echo "Erreur lors de l'inscription: " . mysqli_error($conn);
    } else {
        echo "Inscription réussie !";
        $_SESSION['username'] = $prenom;

        
        $iduser = "SELECT id_user FROM user WHERE mail = ?";
        $stmt1 = mysqli_prepare($conn, $iduser);
        mysqli_stmt_bind_param($stmt1, "s", $mail);
        mysqli_stmt_execute($stmt1);
        $resultId = mysqli_stmt_get_result($stmt1);

        $usernamesId = array();
        while ($row = mysqli_fetch_assoc($resultId)) {
          $usernamesId[] = $row;
        }
        $resulUserIdFt = $usernamesId[0];
        $id = $resulUserIdFt['id_user'];
        $_SESSION['idUser'] = $id;
        header("Location: FINALmenu.php?username=$prenom&idUser=$id");
    }
    
    // Fermer la connexion
    mysqli_close($conn);
}
?>