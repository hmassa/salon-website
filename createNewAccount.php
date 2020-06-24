<?php
    
    $username = empty($_POST['username']) ? '' : $_POST['username'];
    $fname = empty($_POST['fname']) ? '' : $_POST['fname'];
    $lname = empty($_POST['lname']) ? '' : $_POST['lname'];
    $password1 = empty($_POST['password1']) ? '' : $_POST['password1'];
    $password2 = empty($_POST['password2']) ? '' : $_POST['password2'];

    if (strlen($username) < 4){
        $error = "Your account could not be created. Make sure your username is at least 4 characters";
        require "createAccountForm.php";
    } else if (strcmp($password1, $password2) != 0) {
        $error = "Your account could not be created. Make sure your passwords match";
        require "createAccountForm.php";
    } else if (strlen($password1) < 8){
        $error = "Your account could not be created. Make sure your password is at least 8 characters";
        require "createAccountForm.php";
    } else {
        require_once "db.conf";

        if(!session_start()) {
            header("Location: loginForm.php"); // changed
            exit;
        }

        $username = $mysqli->real_escape_string($username);
        $fname = $mysqli->real_escape_string($fname);
        $lname = $mysqli->real_escape_string($lname);
        
        $query = "INSERT INTO Users VALUES ('$username', '$fname', '$lname', SHA1('$password1'))";
        
        if($mysqli->query($query) === FALSE){
            $error = "Your account could not be created. Make sure your username is unique";
            require "createAccountForm.php";
            exit;
        } 
        else {
            $_SESSION['loggedin'] = $username;
            header ("Location: welcome.php");
            exit;
        }

        $mysqli->close();
    }
?>