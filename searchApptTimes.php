<?php
    require_once 'db.conf';

    $function = empty($_GET['function']) ? '' : $_GET['function'];

    $hours = [
            '08:00:00' => '8:00am',
            '10:00:00' => '10:00am',
            '12:00:00' =>'12:00pm',
            '14:00:00' => '2:00pm',
            '16:00:00' => '4:00pm',
            '18:00:00' =>'6:00pm',
    ];

    $stylist = empty($_GET['stylist']) ? '' : $_GET['stylist'];
    $date = empty($_GET['date']) ? '' : $_GET['date'];

    $date = $mysqli->real_escape_string($date);
    $fname = $mysqli->real_escape_string(strtok($stylist, ' '));
    $lname = $mysqli->real_escape_string(strtok(' '));

    if (strcmp($function, "search") == 0){
        if (!$stylist || !$date){
            echo "<h2>You must fill out all fields to search.</h2>";
            return;
        }

        $query = "SELECT time FROM appointment WHERE stylistFirst = '$fname' AND stylistLast='$lname' AND date='$date'";
        if($result = $mysqli->query($query)){
            while($row = $result->fetch_assoc()){
                $time = $row['time'];
                unset($hours[$time]);
            }
            $result->free();
        }

        foreach($hours as $key => $value){
            echo "<button type=button onclick='ajax(\"$key\")'>Reserve $value Appointment</button>";
        }


    } else {
        $time = empty($_GET['time']) ? "" : $_GET['time'];
        $service = empty($_GET['service']) ? "" : $_GET['service'];

        $time = $mysqli->real_escape_string($time);
        $service = $mysqli->real_escape_string($service);

        $stmt = "INSERT INTO appointment VALUES ('$date', '$time', '$fname', '$lname', '$service')";

        if($mysqli->query($stmt)){
            echo "<h2>Your appointment on $date at $hours[$time] with $fname $lname is booked!</h2>";
        } else {
            echo "<h2>We're sorry, there was an error and we were not able to book your appointment. Please try again.</h2>";
        }
    }

    $mysqli->close();
?>
