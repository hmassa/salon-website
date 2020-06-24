<?php 

    if(!session_start()) {
		$username = "";
	}

    $username = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
    
    echo "<div class='navbar'>";
        if($username == ''){
            echo "<a id='signedOut' href='loginForm.php'>Log In</a>";
        } else {
        # found at https://www.w3schools.com/howto/howto_css_dropdown_navbar.asp
            echo "<div class='dropdown'>
                <button class='dropbtn'>Logged in as $username</button>
                <div class='dropdown-content'>
                <a href='logout.php'>Log out</a>
                </div>
                </div>"; 
        }
    echo "<a class='home' href='index.php'>Breeze Hair Salon</a>
        <a class='tabs' href='about.php'>About</a>
        <a class='tabs' href='services.php'>Services</a>
        <a class='tabs' href='scheduleAppt.php'>Make an Appointment</a>
        </div>";

?>