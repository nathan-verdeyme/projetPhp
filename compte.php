<!DOCTYPE html>
<html>
<head>
  <title>Ma première page</title>
  <script>
  var slides = document.getElementsByClassName("slide");
var currentSlide = 0;

// Afficher la première image
slides[currentSlide].style.display = "block";

// Fonction pour passer à la diapositive suivante
function nextSlide() {
  slides[currentSlide].style.display = "none";  // Cacher l'image courante
  currentSlide = (currentSlide + 1) % slides.length;  // Passer à la diapositive suivante
  slides[currentSlide].style.display = "block";  // Afficher la nouvelle diapositive
}

// Automatiser le diaporama en changeant de diapositive toutes les 3 secondes
setInterval(nextSlide, 5000);
</script>

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
      background-image: linear-gradient(rgba(0, 0, 0, 0.342),rgba(0, 0, 0, 0.342)),url(plane.jpg);
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

    .slideshow-container {
  position: relative;
  max-width: 100%;
  height: auto;
}

.slide {
  display: none;
  width: 100%;
  height: auto;
}

.slideshow {
      position: absolute;
      
      width: 295px;
      height: 298px;
      margin: 0 auto;
      overflow: hidden;
      top: 30%;
      right: 38%;
    }

    .slides {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .slideshow img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .slideshow img.active {
      opacity: 1;
    }

    .controls {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      text-align: center;
      margin-bottom: 10px;
    }

    .controls button {
      margin: 0 10px;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      color: #fff;
      background-color: #4285F4;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .controls button:hover {
      background-color: #3367D6;
    }

    .controls button:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.4);
    }

    .controls .prev {
      background-color: #db4437;
    }

    .controls .prev:hover {
      background-color: #C5372E;
    }

    .controls .next {
      background-color: #0f9d58;
    }

    .controls .next:hover {
      background-color: #0D874E;
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


  

  
  
  <div class="slideshow">
    <div class="slides">
      <img src="vac1.jpg" alt="Image 1">
      <img src="vac2.jpg" alt="Image 2">
      <img src="back.jpg" alt="Image 3">
      <img src="vietnam.jpg" alt="Image 5">
      <img src="playa.jpg" alt="Image 6">
      <img src="grece.jpg" alt="Image 7">
        </div>
  </div>

  

<footer>
    <p>© 2023 SunWish.com | Tous droits réservés.</p>
  </footer>
</body>
</html>
