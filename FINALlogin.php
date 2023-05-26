<html>
	<head>
		<title>Login SunWish</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="FINALlogin.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<header>

		</header>
		<main>
			<h2>Envie de rejoindre l'aventure ? </h2>
            <div id="container">
                <!-- zone de connexion -->
				<div class="cadre">
				<h1>Connexion</h1>
				
                <form action="verification.php" method="POST">
										<input type="text" name="mail" placeholder="Mail de l'utilisateur" required>
      									<input type="password" name="password" placeholder="Mot de passe" required>							
										<button type="submit">Se connecter</button>
										<button type="button" onclick="window.location='inscription.html';">Pas encore inscrit ?</button>
									</form>
                <?php
                if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                </form>
				</div>

		</main>

		<footer>
		</footer>
	</body>
</html>
