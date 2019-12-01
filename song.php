<?php include "dbinfo.inc";
    if (isset($_GET["username"])) {
        $username = $_GET["username"];
    }
    else {
        echo "User is not logged in.";
        die();
    }
    if (isset($_GET["song"])) {
        $song = $_GET["song"];
    }
    else {
        echo "An error occurred.";
        die();
    }
    $results_per_page = 20;
?>

<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>Soundtrack Search - <?php echo $song ?></title>
    </head>
    <body>
    <body class="home_body">
        <div class="home_container">
            <div class="nav_bar"></div>
            <div class="home_title"><?php echo $song; ?></div>
            <div class="nav_bar_home" style="background-color: white; color: orangered;"><a style="text-decoration: none; color: inherit;" href="home.php?username=<?php echo $username; ?>">Home</a></div>
            <div class="nav_bar_account"><a style="text-decoration: none; color: inherit;" href="account.php?username=<?php echo $username; ?>">Account</a></div>
            <div class="nav_bar_logout"><a style="text-decoration: none; color: inherit;" href="login.html">Logout</a></div>
            <div class="search_container"></div>
            <div class="search">
                <form action="search.php?username=<?php echo $username; ?>&page=1" method="POST">
                    <input class="search_input" type="text" name="search"/>
                    <select class="search_input" name="search_choice" id="seach_choice">
                        <option name="song" id="song" value="song">Song</option>
                        <option name="movie" id="movie" value="song">Movie</option>
                    </select>
                    <input class="search_input" type="submit" name="submit" Value="Search"/>
                </form>
            </div>
            <div class="search_results_container">
                <div style="text-indent: 47vw; padding-bottom: 10px; color: orangered; font-size: 22px;">Movies</div>
                <?php
                    $query = "CALL MovieFromSong('$song')";
                    $result = $db->query($query);
                    $num = mysqli_num_rows($result);

                    if ($num > 0) {
                        $page = $_GET['page'];
                        $total_pages = ceil($num / $results_per_page);
                        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                        for ($i = ($page - 1) * $results_per_page; $i < ($page * $results_per_page); ++$i) {
                            if (isset($result[$i]['primaryTitle'])){
                                echo "<div class='search_results_title'><a style='text-decoration: none; color: inherit;' href='movie.php?username=";
                                echo $username;
                                echo "&movie=";
                                echo $result[$i]['primaryTitle'];
                                echo "&page=1'>";
                                echo $result[$i]['primaryTitle'];
                                echo "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo "<button class='imdb' onclick=";
                                echo "location.href='";
                                echo "https://www.imdb.com/title/";
                                echo $result[$i]['tconst'];
                                echo "'>IMDb</button>";
                                echo "<br/>";
                                echo "</div>";
                            }
                        }
                    }
                    else {
                        echo "<div class='search_results_title'>No results found</div>";
                    }  
                ?>
            </div>
        </div>
    </body>
</html>