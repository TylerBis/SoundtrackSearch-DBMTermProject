<?php include "dbinfo.inc";
    if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));
        if ($password == $confirm_password) {
            $query = "INSERT INTO dnts.Users values(NULL,'$username','$password')";
            $success = $db->query($query);
            if ($success) {
                header("Location: login.php?create=success");
                die();
            }
            else {
                header("Location: login.php?create=failed");
                die();
            }
        }
        else {
            header("Location: login.php?Error=PasswordMatch");
        }
    }
?>