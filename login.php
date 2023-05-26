<html>
	<head>
		<title>Projets</title>
		<meta charset="utf-8"/>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
    	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
		<script src="script.js"></script>
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
  margin: 0;
  padding: 0;
  font-family: poppins;
}

body {
    font-family: Arial, sans-serif;
    
    background-position: center;
    background-size: cover;
    background-image: linear-gradient(rgba(82, 87, 85, 0.329),rgba(82, 87, 85, 0.329)),url(back_login.jpg);
    background-repeat: no-repeat;
    width: 100%;
    height: 100vh;
  }
  
  

  .login-container {
    max-width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  

  h1 {
    text-align: center;
    margin-bottom: 20px;
  }
  
  input[type="text"]{
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid black;
    border-radius: 18px;
    
    

  }
  input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 18px;
    border: 1px solid black;
    margin-top: 19px;
  }

  input[type="text"]:hover, input[type="password"]:hover {
    
    color: rgb(0, 72, 255);
    
  }
  
  button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #3484d4;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 20px;
    border: 1px solid black;
  }
  
  button[type="submit"]:hover {
    background-color: #ccc;
	
  }

  .cadre {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 2px solid;
    border-image: linear-gradient(to right, #26a7b6, #b88318);
    border-image-slice: 1;
    border-radius: 30px;
    padding: 20px;
	background-color: #1ebecc;
	opacity: 80%;
  }

  h2{
    position: absolute;
    margin-left: 30.5%;
    margin-top: 85px;
    font-size: 35px;
    text-shadow: 0 0 5px #2e999b;
  }

  .logo{
    width: 70px;
    height: 70px;
    cursor: pointer;
    position: absolute;
    opacity: 67%;
    margin-top: 3px;
    margin-left: 3px;
    
}
</style>
	</head>
	<body>
	<img src="SunWish.png" class="logo">
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

		
	</body>
</html>
