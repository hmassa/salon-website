<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Create Account</title>

        <link href="finalProject.css" rel="stylesheet" type="text/css">
        <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>

        <script>
            $(document).ready(function() {
                $("#username").keyup(function() {
                    if ($("#username").val().length < 4){
                        $("#usernameError").removeAttr('hidden');
                        $("#usernameError").html("Username must be at least 4 characters long");
                    } else {
                        $("#usernameError").attr('hidden', true);
                        $.get("newAccountVerification.php?user=" + $("#username").val(), function(data) {
                            if (data){
                                $("#usernameError").removeAttr('hidden');
                                $("#usernameError").html(data);
                            }
                        });
                    }
                });

                $("#password1").keyup(function() {
                    if ($("#password1").val().length < 8){
                        $("#passLength").removeAttr("hidden");
                        $("#password2").attr('disabled', true);
                    } else {
                        $("#password2").removeAttr("disabled");
                        $("#passLength").attr('hidden', true);
                    }

                    if ($("#password1").val() != $("#password2").val() && $("#password2").val().length > 0){
                       $("#matchError").removeAttr('hidden');
                    } else {
                        $("#matchError").attr('hidden', 'true');
                    }
                });

                $("#password2").keyup(function() {
                    if ($("#password1").val() != $("#password2").val()){
                       $("#matchError").removeAttr('hidden');
                    } else {
                        $("#matchError").attr('hidden', true);
                    }
                });
            });
        </script>

        <script>
            $(function(){
                $("input[type=submit]").button();
                $("input[type=reset]").button();
            });
        </script>

    </head>

    <body class="gradient">
        <div id="loginWidget" class="ui-widget">
            <h1 class="ui-widget-header">New Account</h1>
            <?php
                if (isset($error)) {
                    print "<div class=\"ui-state-error\">$error</div>\n";
                }
            ?>
            <form action="createNewAccount.php" method="POST">
                <div class="stack">
                    <label for="fname">First Name: </label>
                    <input type="text" name="fname" id="fname" maxlength="20" required>
                </div>

                <div class="stack">
                    <label for="lname">Last Name: </label>
                    <input type="text" name="lname" id="lname" maxlength="20" required><br>
                </div>

                <div class="stack">
                    <label for="username">Username: </label>
                    <input type="text" name="username" id="username" maxlength="20" required><br>
                    <div class="ui-state-error" id="usernameError" hidden></div>
                </div>

                <div class="stack">
                    <label for="password1">Password: </label>
                    <input type="password" name="password1" id="password1" maxlength="20" required><br>
                    <div id="passLength" class="ui-state-error" hidden>Password must be at least 8 characters long</div>
                </div>

                <div class="stack">
                    <label for="password2">Re-enter Password: </label>
                    <input type="password" name="password2" id="password2" maxlength="20" required><br>
                    <div id="matchError" class="ui-state-error" hidden>Passwords do not match</div>
                </div>

                <div class="stack">
                    <input type="submit" value="Create Account" id="submit">
                    <input type="reset" id="clrBtn" value="Clear Form">
                </div>
            </form>

            <p class="formText">Have an account already?<br><a href="loginForm.php">Log in here</a></p>

        </div>
    </body>
</html>
