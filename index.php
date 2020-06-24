<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>

        <link href="finalProject.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <?php
            require_once "navbar.php";
        ?>

        <div id="frontPage">
            <img src="images/owners.png" alt="Salon owners">
            <div id="logoBackground">
                <div id="logo">
                    <h2>Breeze</h2>
                    <h3>Hair Salon</h3>
                    <p>By Smith + Simms</p>
                </div>
            </div>
            <img src="images/salon.PNG" alt="Salon">
        </div>

        <div id="divider"></div>

        <?php
            require_once "contactInfo.php";
        ?>

    </body>

</html>
