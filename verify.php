<?php include "dbinfo.inc";
       if (isset($_POST["username"]) && isset($_POST["password"])) {
              $username = htmlspecialchars(trim($_POST["username"]));
              $password = htmlspecialchars(trim($_POST["password"]));
              $query = $db->query("SELECT userName,password FROM dnts.Users WHERE userName='$username' AND password='$password'");
              if (mysqli_num_rows($query) > 0) {
                header("Location: home.php?username=$username");
                die();
              }
              else {
                header("Location: login.php?Error=UnknownLogin");
                die();
              }
       }
?>
