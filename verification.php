<?php
session_start();
require_once('connexionBdd.php');

if (isset($_POST['mail']) && isset($_POST['password'])) {
  $mail = mysqli_real_escape_string($conn, htmlspecialchars($_POST['mail']));
  $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));

  if ($mail !== "" && $password !== "") {
    $requete = "SELECT password FROM user WHERE mail = ?";
    $stmt = mysqli_prepare($conn, $requete);
    mysqli_stmt_bind_param($stmt, "s", $mail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $hashedPassword = $row['password'];

      if (password_verify($password, $hashedPassword)) {
        // Mot de passe correct, l'utilisateur peut se connecter

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

        $sql = "SELECT username FROM user WHERE mail = ?";
        $stmt2 = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt2, "s", $mail);
        mysqli_stmt_execute($stmt2);
        $resultUsername = mysqli_stmt_get_result($stmt2);

        $usernames = array();
        while ($row = mysqli_fetch_assoc($resultUsername)) {
          $usernames[] = $row;
        }
        $resulUserFt = $usernames[0];
        $name = $resulUserFt['username'];
        $_SESSION['username'] = $name;

        header("Location: FINALmenu.php?username=$name&idUser=$id");
        exit();
      } else {
        header('Location: FINALlogin.php?erreur=1'); // Mot de passe incorrect
        exit();
      }
    } else {
      header('Location: FINALlogin.php?erreur=1'); // Utilisateur non trouvé
      exit();
    }
  } else {
    header('Location: FINALlogin.php?erreur=2'); // Champ(s) vide(s)
    exit();
  }
} else {
  header('Location: FINALlogin.php');
  exit();
}

mysqli_close($conn);
?>
