
<!DOCTYPE html>
<html lang="fr">

<head>
    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IEedge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Agence de voyage SunWish</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


        *{
            margin: 0px;
            padding: 0px;
            font-family: Roboto;
        }

        .container{
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url(images/back2.jpg);
            background-position: center;
            background-size: cover;
            padding-left: 12%;
            padding-right: 6%;
            box-sizing: border-box;
            
            min-height: 100vh;
        }

        .navbar{
            height: 12%;
            display: flex;
            align-items: center;
            text-decoration: none;
            

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

        .men{
            width: 30px;
            cursor: pointer;
            margin-left: 40px;
        }

        nav{
            flex: 1;
            text-align: right;
            
        }

        nav ul li{
            list-style: none;
            display: inline-block;
            margin-left: 60px;
        }

        nav ul li a{
            text-decoration: none;
            color: #fff;
            font-size: 13px;
            margin-left: 14px;
            
        }

        .row{
            display: flex;
            height: 88%;
            align-items: center;
            
        }

        .col{
            
            flex-basis: 50%;

        }

        h1{
            color: #fff;
            font-size: 50px;
        }

        h5{
            color: rgb(73, 73, 76);
            font-size: 18px;
            text-shadow: 0 0 5px #999;
        }

        .card p {
            text-shadow: 0 0 15px #000;
        }

        p{
            color: #fff;
            font-size: 20px;
            line-height: 20px;
            font-family: poppins;
        }

        button{
            width: 180px;
            color: #000;
            font-size: 12px;
            padding: 12px 0;
            background: #fff;
            border: 3px solid black;
            border-radius: 20px;
            outline: none;
            margin-top: 30px;
            font-family: poppins;
            font-weight: bold;


        }

        .card{
            position: relative;
            width: 200px;
            height: 230px;
            display: inline-block;
            border-radius: 10px;
            padding: 25px 25px;
            box-sizing: border-box;
            cursor: pointer;
            margin: 10px 15px;
            background-position: center;
            background-size: cover;
            transition: transform 0.5;

}

        .card1{
            background-image: url(images/back.jpg);

        }

        .card2{
            background-image: url(images/back1.jpg);

        }

        .card3{
            background-image: url(images/vac1.jpg);

        }

        .card4{
            background-image: url(images/vac2.jpg);

        }

        .card:hover{
            transform: translateY(-10px);

        }

        footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
      width: 100%
    }

        

        
        
    </style>
</head>
<body>
<?php 
  include_once("connexionBdd.php");
  if(!empty($_GET['username'])  && !empty($_GET['idUser'] )){
      
      ?>
      <img src="images/SunWish.png" class="logo">

    
<div class="container">
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="MELVINcompte.php">COMPTE</a></li>
                <li><a href="main.php">VOYAGES</a></li>
                <li><a href="">CONTACT</a></li>
            </ul>
        </nav>
        <img src="images/menu.png" class="men">
    </div>
    <div class="row">
        <div class="col">
            <h1>Bienvenue sur notre agence de voyage ! </h1> <br>
            <p> Nous proposons de nombreuses solutions pour que vous puissiez rejoindre votre destination de rêve </p>
            <button type="button">Explore</button>

        </div>

        <div class="col">
            <div class="card card1">
                <h5>Malaisie</h5> <br>
                <p>Paysages de rêves et des extras sans limite</p>
            </div>
            <div class="card card2">
                <h5>Afrique du Sud</h5> <br>
                <p>Paysages de rêves et des extras sans limite</p>
            </div>
            <div class="card card3"> 
                <h5>Argentine</h5> <br>
                <p>Paysages de rêves et des extras sans limite</p>
            </div>
            <div class="card card4"> 
                <h5>Bahamas</h5> <br>
                <p>Paysages de rêves et des extras sans limite</p>
            </div>

        </div>
</div>
<?php 
  }else{
  ?>

    <img src="images/SunWish.png" class="logo">

    
    <div class="container">
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="FINALlogin.php">LOGIN</a></li>
                </ul>
            </nav>
            <img src="images/menu.png" class="men">
        </div>
        <div class="row">
            <div class="col">
                <h1>Bienvenue sur notre agence de voyage ! </h1> <br>
                <p> Nous proposons de nombreuses solutions pour que vous puissiez rejoindre votre destination de rêve </p>
                <button type="button">Explore</button>

            </div>

            <div class="col">
                <div class="card card1">
                    <h5>Malaisie</h5> <br>
                    <p>Paysages de rêves et des extras sans limite</p>
                </div>
                <div class="card card2">
                    <h5>Afrique du Sud</h5> <br>
                    <p>Paysages de rêves et des extras sans limite</p>
                </div>
                <div class="card card3"> 
                    <h5>Argentine</h5> <br>
                    <p>Paysages de rêves et des extras sans limite</p>
                </div>
                <div class="card card4"> 
                    <h5>Bahamas</h5> <br>
                    <p>Paysages de rêves et des extras sans limite</p>
                </div>

            </div>
    </div>
<?php }
?>
    <footer>
        <p>© 2023 SunWish.com | Tous droits réservés.</p>
      </footer>   
    
</body>

</html>

