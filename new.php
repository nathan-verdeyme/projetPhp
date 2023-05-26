<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset ="utf-8">
        <title> Menu bar CSS</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

            body{
                font-family: 'Roboto', sans-serif;
            }

            *{
                margin: 0;
                padding: 0;
                list-style: none;
                text-decoration: none;

            }

            .sidebar {
                position: fixed;
                left: 0;
                width: 250px;
                height: 100%;
                background: #042331 ;

            }

            .sidebar header{
                font-size: 22px;
                color: white;
                text-align: center;
                line-height: 70px;
                background: #063146;
                user-select: none;

            }

            .sidebar ul a{
                display: block;
                height: 100%;
                width: 100%;
                line-height: 65px;
                font-size: 20px;
                color: white;
                padding-left: 40px;
                box-sizing: border-box;
                border-top: 1px solid rgba(255,255,255,.1);
                border-bottom: 1px solid black;
                transition: .4s;
            }

            ul li:hover a{
                padding-left: 50px;
            }

            .sidebar ul a i{
                margin-right: 16px;
            } 

            #check{
                display: none;

            }

            label #btn, label #cancel{
                position: absolute;
                cursor: pointer;

            }

            label #btn{
                left: 40px;
                top: 25px;
                font-size: 35px;
                color: white;
            }
        </style>
    </head>

    <body>
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>

        </label>
        <div class="sidebar">
            <header>My app</header>
            <ul>
                <li><a href="#"><i class="fas fa-qrcode"></i>Dashboard</a></li>
                <li><a href="#"><i class="fas fa-link"></i>Shortcuts</a></li>
                <li><a href="#"><i class="fas fa-stream"></i>Overview</a></li>
                <li><a href="#"><i class="fas fa-calendar-week"></i>Events</a></li>
                <li><a href="#"><i class="fas fa-question-circle"></i>About</a></li>
                <li><a href="#"><i class="fas fa-sliders-h"></i>Services</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
            </ul>
        </div>
    </body>
</html>