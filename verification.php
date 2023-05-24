<?php
session_start();
require_once('connexionBdd.php');
if (isset($_POST['mail']) && isset($_POST['password'])) {

  // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
// pour Ã©liminer toute attaque de type injection SQL et XSS
  $mail = mysqli_real_escape_string($conn, htmlspecialchars($_POST['mail']));
  $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

  if ($username !== "" && $password !== "") {
    $requete = "SELECT count(*) FROM user where
                mail = '" . $mail . "' and password = '" . $password . "' ";
    $exec_requete = mysqli_query($conn, $requete);
    $reponse = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];
    if ($count != 0) // nom d'utilisateur et mot de passe correctes
    {
      $sql = "select username from user where mail = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "s", $mail);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $usernames = array();
      while ($row = mysqli_fetch_assoc($result)) {
        $usernames[] = $row;
      }
      $resulUserFt = $usernames[0];
      $name = $resulUserFt['username'];
      $_SESSION['username'] = $name;

      header('Location: main.php');
    } else {
      header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
    }
  } else {
    header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
  }
} else {
  header('Location: login.php');
} // fermer la connexion
?>