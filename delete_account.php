<?php include "dbinfo.inc";
    if (isset($_POST["submit"])) {
        $username = $_GET["username"];
        $password = htmlspecialchars(trim($_POST["password"]));
        $confirm_password = htmlspecialchars(trim($_POST["confirm_password"]));

        if ($password == $confirm_password) {
            $query = "SELECT * FROM dnts.Users WHERE userName='$username' AND password='$password'";
            $result = $db->query($query);
            $num = mysqli_num_rows($result);
            if ($num == 0) {
                header("Location: logout.php?delete_account=fail");
            }
            else {
                $query = "DELETE FROM dnts.Users WHERE userName='$username'";
                $db->query($query);
                header("Location: logout.php?delete_account=success");
            }
        }
        else {
            header("Location: logout.php?delete_account=error");
        }
    }
?>
