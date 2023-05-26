<!DOCTYPE html>
<html>
<head>
  <title>Mon compte SunWish</title>
  <style>

    *{
        margin: 0;
        padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background-image: linear-gradient(rgba(82, 87, 85, 0.623),rgba(82, 87, 85, 0.623)),url(images/back2.jpg);
        background-position: center;
        background-size: cover;
    }
    
    header {
      background-color: rgba(82, 87, 85, 0.623);
      color: #fff;
      padding: 20px;
      text-align: center;
      height: 60px;
      opacity: 70%;
    
    }


    
    main {
      flex-grow: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    
    .container {
      border: 2px solid #333;
      padding: 20px;
      width: 250px;
      height: 40vh;
    }
    
    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    
    h1{
        position: relative;
        font-size: 20px;
        margin-top: 20px;
        

    }

  </style>
</head>
<body>
  <header>
    <h1>Bienvenue sur votre espace personnel vous pouvez consulter vos informations</h1>
  </header>
  
  <main>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
  </main>
  
  <footer>
    <p>© 2023 SunWish.com | Tous droits réservés.</p>
  </footer>
</body>
</html>
