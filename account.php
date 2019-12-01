<?php
    if (isset($_GET["username"])) {
        $username = $_GET["username"];
    }
    else {
        echo "User is not logged in.";
        die();
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>Soundtrack Search - Account</title>
    </head>
    <body>
    <body class="home_body">
        <div class="home_container">
            <div class="nav_bar"></div>
            <div class="home_title">Soundtrack Search</div>
            <div class="nav_bar_home"><a style="text-decoration: none; color: inherit;" href="home.php?username=<?php echo $username; ?>">Home</a></div>
            <div class="nav_bar_account" style="background-color: white; color: orangered;"><a style="text-decoration: none; color: inherit;" href="account.php?username=<?php echo $username; ?>">Account</a></div>
            <div class="nav_bar_logout"><a style="text-decoration: none; color: inherit;" href="login.html">Logout</a></div>
            <div class="search_results_container"></div>
            <form style="width: 100%;" class="delete_account" action="delete_account.php?username=<?php echo $username; ?>" method="POST">
                <span class="login_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete Account</span><br/>
                <input class="login_input" type="password" name="password" placeholder="Password"/><br/>
                <input class="login_input" type="password" name="confirm_password" placeholder="Confirm Password"/><br/>
                <input class="login_input" type="submit" name="submit" value="Delete Account"/><br/>
            </form>
            <form style="width: 100%;" class="change_password" action="change_password.php?username=<?php echo $username; ?>" method="POST">
                <span class="login_text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Change Password</span><br/>
                <input class="login_input" type="password" name="old_password" placeholder="Old Password"/><br/>
                <input class="login_input" type="password" name="new_password" placeholder="New Password"/><br/>
                <input class="login_input" type="password" name="confirm_new_password" placeholder="Confirm New Password"/><br/>
                <input class="login_input" type="submit" name="submit" value="Change Password"/><br/>
            </form>
            
        </div>
    </body>
</html>