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
            require_once 'db.conf';
        ?>

        <div class="tableContainer clear">
            <h1>Services</h1>
            <div class="photoCol">
                <img src="images/hair.PNG" alt="hair 1">
                <img src="images/hair2.PNG" alt="hair 2">
                <img src="images/hair3.PNG" alt="hair 3">
                <img src="images/hair7.png" alt="hair 7">
            </div>

            <div id="services">
                <table>

                    <?php
                        $query1 = "SELECT DISTINCT section FROM Services";
                        if($result1 = $mysqli->query($query1)){
                            while($row1 = $result1->fetch_assoc()){
                                $type = $row1["section"];
                                echo"<tr><th colspan='2'>$type</th></tr>";

                                $query2 = "SELECT service, price FROM Services WHERE section='$type'";
                                if($result2 = $mysqli->query($query2)){
                                    while($row2 = $result2->fetch_assoc()){
                                        $price = $row2['price'];
                                        $service = $row2['service'];
                                        echo "<tr><td class='col1'>$service</td><td class='col2'>$$price</td></tr>";
                                    }
                                    $result2->free();
                                }
                                echo "<tr><td colspan='2'></td></tr>";
                            }
                            $result1->free();
                        }
                        $mysqli->close();
                    ?>
                </table>

                <p>Don't see what you're looking for? Let us know through email or at your next appointment and we can make it happen!</p>
            </div>

            <div class="photoCol">
                <img src="images/hair4.PNG" alt="hair 4">
                <img src="images/hair5.PNG" alt="hair 5">
                <img src="images/hair6.png" alt="hair 6">
                <img src="images/hair8.png" alt="hair 8">
            </div>

        </div>

        <?php
            require_once "contactInfo.php";
        ?>
    </body>

</html>
