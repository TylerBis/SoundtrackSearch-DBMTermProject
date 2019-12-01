<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>Soundtrack Search - Logout</title>
    </head>
    <body class="login_body">
        <div class="logout_container">
            <button class="logout_go_home_btn" onclick="location.href='login.html'">Go Home</button>
<?php
    if (isset($_GET['password_change'])) {
        if ($_GET['password_change'] == 'success') {
            echo "<div class='logout_message'>Password change successful.</div>";
        }
        elseif ($_GET['password_change'] == 'fail') {
            echo "<div class='logout_message'>Password change failed.</div>";
        }
        elseif ($_GET['password_change'] == 'mismatch') {
            echo "<div class='logout_message'>Passwords do not match.</div>";
        }
        else {
            echo "<div class='logout_message'>An error occurred.</div>";
        }
    }
    elseif (isset($_GET['delete_account'])) {
        if ($_GET['delete_account'] == 'success') {
            echo "<div class='logout_message'>Account has been deleted.</div>";
        }
        elseif ($_GET['delete_account'] == 'fail') {
            echo "<div class='logout_message'>Account failed to be deleted.</div>";
        }
        else {
            echo "<div class='logout_message'>An error occurred.</div>";
        }
    }
    else {
        echo "<div class='logout_message'>You are not logged in.</div>";
    }
?>  
        </div>    
    </body>
</html>
