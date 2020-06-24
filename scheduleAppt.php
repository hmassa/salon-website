<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Schedule an Appointment</title>
        
        <link href="finalProject.css" rel="stylesheet" type="text/css">
        
        <script>
            var date;
            var stylist;
            var service;
            
            function ajax(data) {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.onreadystatechange = function() {
                    if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                        var response = xmlHttp.responseText;
                        document.getElementById("loader").style.display = "none";
                        document.getElementById("searchResults").innerHTML = response;
                    }
                };

                document.getElementById("loader").style.display = "inherit";
                
                if(data.localeCompare("search") == 0){   
                    date = encodeURIComponent(document.getElementById("date").value);
                    stylist = encodeURIComponent(document.getElementById("stylist").value);
                    service = encodeURIComponent(document.getElementById("service").value);
                    var reqURL = "searchApptTimes.php?function=search&date=" + date + "&stylist=" + stylist + "&service=" + service;   
                } else {
                    console.log(date);
                    console.log(stylist);
                    var reqURL = "searchApptTimes.php?function=reserve&time=" + data + "&date=" + date + "&stylist=" + stylist + "&service=" + service;
                }
            
                xmlHttp.open("GET", reqURL, true);
                xmlHttp.send();
            }
        </script>
    </head>
    
    <body>
        
        <?php
            // While lines 47-50 appear in the navbar.php file, we need to check that the user is signed in before
            // including that file. Otherwise, the navigation bar will appear on the log in form page and that 
            // looks weird.
            if(!session_start()) {
                $username = "";
            }
            $username = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
        
            if(!$username){
                $error = "You must be logged in to schedule an appointment";
                require "loginForm.php";
                exit;
            }
        
            require_once "navbar.php";
            require_once "db.conf";
        ?>
        
        <div id="search">
            <h1>Schedule your next appointment</h1>
            <h2>Fill out the fields below to find an appoinment that works for you</h2>
            <form id="searchForm">
                <select name="service" id="service">
                    <!-- PHP from https://www.php.net/manual/en/mysqli-result.fetch-assoc.php-->
                    <?php                    
                        $query = "SELECT service FROM Services";
                        if($result = $mysqli->query($query)){
                            while($row = $result->fetch_assoc()){
                                $temp = $row["service"];
                                echo"<option value='$temp'>$temp</option>";
                            }
                            
                            $result->free();
                        }
                    
                    ?>
                </select>
                
                <select name="stylist" id="stylist">
                    <?php
                        $query = "SELECT fname, lname FROM Stylists";
                        if($result = $mysqli->query($query)){
                            while($row = $result->fetch_assoc()){
                                $first = $row["fname"];
                                $last = $row["lname"];
                                echo"<option value=\"$first $last\">$first $last</option>";
                            }
                            
                            $result->free();
                        }
                    
                        $mysqli->close();
                    ?>
                </select>
                
                <input type="date" name="date" id="date">
                <button type="button" onclick="ajax('search')">Search Appointments</button>
            </form>
        </div>
        
        <div id="loader"></div>
        
        <div id="searchResults"></div>
        
        <?php
            require_once "contactInfo.php";
        ?>
        
    </body>
</html>