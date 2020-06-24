<?php
// Code adapted from User Authentication (During Class) > 4. session > login.php

    if(!session_start()){
        header("Location: error.php");
        exit;
    }

    $username = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
    if ($username != '') {
        header("Location: welcome.php");
        exit;
    }

	$action = empty($_POST['action']) ? '' : $_POST['action'];
	if ($action == 'do_login') {
		handle_login();
	} else {
		login_form();
	}

	function handle_login() {

        require_once 'db.conf';

        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $username = $mysqli->real_escape_string($username);

				$password = empty($_POST['password']) ? '' : $_POST['password'];
        $password = sha1($password);

        $query = "SELECT Username, Password FROM Users WHERE Username='$username'";

        if($result = $mysqli->query($query)){
            if($row = $result->fetch_assoc()){
                if (strcmp($password, $row["Password"]) == 0){
                    $_SESSION['loggedin'] = $username;
                    header("Location: index.php");
                    exit;
                } else {
                    $error = "Incorrect password";
                    require "loginForm.php";
                }
            } else {
                $error = "Incorrect username";
                require "loginForm.php";
            }

            $result->free();
        } else {
            $error = "Error: please contact site administrator and try again later";
            require "loginForm.php";
        }

        $mysqli->close();
	}

	function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
	}
?>
