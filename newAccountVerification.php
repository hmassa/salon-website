<?php
    require_once "db.conf";

    $user = empty($_GET['user']) ? '' : $_GET['user'];
    $user = $mysqli->real_escape_string($user);

    if ($user != ''){
        $query = "SELECT Username FROM Users WHERE Username = '$user'";
        if($result = $mysqli->query($query)){
            if ($result->num_rows > 0){
            echo "This username is already taken";
            }
        }
        
        
        $result->free();
    }

    $mysqli->close();
?>