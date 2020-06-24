<!DOCTYPE html>

<!-- Code adapted from User Authentication (During Class) > 4. session > login_form.php -->

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Log In</title>

        <link href="finalProject.css" rel="stylesheet" type="text/css">
        <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

        <script>
            $(function(){
                $("input[type=submit]").button();
            });
        </script>

    </head>

    <body class="gradient">
        <div id="loginWidget" class="ui-widget">
            <h1 class="ui-widget-header">Login</h1>

            <?php
                if (isset($error)) {
                    print "<div class=\"ui-state-error\">$error</div>\n";
                }
            ?>

            <form action="login.php" method="POST">

                <input type="hidden" name="action" value="do_login">

                <div class="stack">
                    <label for="username">User name:</label>
                    <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus>
                </div>

                <div class="stack">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all">
                </div>

                <div class="stack">
                    <input type="submit" value="Submit">
                </div>
            </form>

            <p class="formText">Don't have an account?<br><a href="createAccountForm.php">Sign up here</a></p>
        </div>
    </body>
</html>
