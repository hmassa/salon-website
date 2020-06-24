<?php
    if(!session_start()) {
		header("Location: loginForm.php");
		exit;
	}

    $loggedIn = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	if ($loggedIn == '') {
		header("Location: loginForm.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
        
        <link href="finalProject.css" rel="stylesheet" type="text/css">
        <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#welcome").effect("slide", {direction: "up"}, 600);
                
                $("#button").click(function(){
                    window.location.href='index.php';
                });
            });
        </script>
    </head>
    
    <body class="gradient">
        <div id="welcome">
            <?php
                echo "<h1 class='welcomeHeader'>Welcome, $loggedIn!</h1>";
            ?>
            <h4 class="welcomeText">Your account has been successfully created! Click here to continue to the site:</h4>
            <button type="button" id="welcomeButton"><a href="index.php">Take me to the site!</button>
        </div>
    </body>
</html>