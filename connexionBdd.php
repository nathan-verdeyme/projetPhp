<?php

// Définition des constantes de connexion
define('DB_SERVER', 'db4free.net');
define('DB_USERNAME', 'adminprojet');
define('DB_PASSWORD', 'adminprojet');
define('DB_NAME', 'projetweb');

// Connexion à la base de données
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérification si la connexion a réussi
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

?>
