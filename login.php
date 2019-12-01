<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>Soundtrack Search - Login</title>
    </head>
    <body class="login_body">
        <div class="login_container">
            <div class="capital">S</div>
                <div class="first_word">oundtrack</div>
                <div class="second_word">earch</div>
            <div class="login_form">
                <div class="login_text">Login</div>
                <form style="width: 100%; height: 35%;" action="verify.php" method="POST">
                    <input class="login_input" type="text" name="username" placeholder="Username"/><br/>
                    <input class="login_input" type="password" name="password" placeholder="Password"/><br/>
                    <input class="login_input" type="submit" name="login" value="Login"/><br/>
                </form>
                <div class="login_text">Create Account</div>
                <form style="width: 100%; height: 40%;" action="create_account.php" method="POST">
                    <input class="login_input" type="text" name="username" placeholder="Username"/><br/>
                    <input class="login_input" type="password" name="password" placeholder="Password"/><br/>
                    <input class="login_input" type="password" name="confirm_password" placeholder="Confirm Password"/><br/>
                    <input class="login_input" type="submit" name="create" value="Create"/><br/>
                </form>
            </div>
            <?php
                if (isset($_GET["Error"])) {
            ?>
                    <div class="login_error">
            <?php
                    if ($_GET["Error"] == "UnknownLogin") {
                        echo "Incorrect login information.";
                    }
                    elseif ($_GET["Error"] == "PasswordMatch") {
                        echo "Passwords do not match.";
                    }
                    else {
                        echo "An unknown error occurred.";
                    }
            ?>
                    </div>
            <?php
                }
                elseif (isset($_GET["create"])) {
            ?>
                    <div class="login_error">
            <?php
                    if ($_GET["create"] == "success") {
                        echo "<span style='color: green;'>Account created.</span>";
                    }
                    elseif ($_GET["create"] == "failed") {
                        echo "Failed to create account. Username may be taken.";
                    }
                    else {
                        echo "An unknown error occurred.";
                    }
            ?>
                    </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>