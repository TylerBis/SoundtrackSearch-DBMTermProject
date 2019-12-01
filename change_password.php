<?php include "dbinfo.inc";	
    if (isset($_POST["submit"])) {
        $username = $_GET["username"];
        $old_password = htmlspecialchars(trim($_POST["old_password"]));
        $new_password = htmlspecialchars(trim($_POST["new_password"]));
        $confirm_new_password = htmlspecialchars(trim($_POST["confirm_new_password"]));
    
        if ($new_password == $confirm_new_password) {
            $query = "SELECT * FROM dnts.Users WHERE userName='$username' AND password='$old_password'";
            if (mysqli_num_rows(mysqli_query($db,$query)) == 0) {
                header("Location: logout.php?password_change=fail");
            }
            else {
                $query = "UPDATE dnts.Users SET password='$new_password' WHERE userName='$username'";
                $db->query($query);
                header("Location: logout.php?password_change=success");
            }
        }
        else {
            header("Location: logout.php?password_change=mismatch");
        }
    }
?>