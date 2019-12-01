<?php include "dbinfo.inc";
    if (isset($_GET["username"])) {
        $username = $_GET["username"];
    }
    else {
        echo "No user is logged in.";
        die();
    }
    $results_per_page = 20;
?>

<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>Soundtrack Search - Home</title>
    </head>
    <body class="home_body">
        <div class="home_container">
            <div class="nav_bar"></div>
            <div class="home_title">Soundtrack Search</div>
            <div class="nav_bar_home" style="background-color: white; color: orangered;"><a style="text-decoration: none; color: inherit;" href="home.php?username=<?php echo $username; ?>">Home</a></div>
            <div class="nav_bar_account"><a style="text-decoration: none; color: inherit;" href="account.php?username=<?php echo $username; ?>">Account</a></div>
            <div class="nav_bar_logout"><a style="text-decoration: none; color: inherit;" href="login.html">Logout</a></div>
            <div class="search_container"></div>
            <div class="search">
                <form action="search.php?username=<?php echo $username; ?>&page=1" method="POST">
                    <input class="search_input" type="text" name="search"/>
                    <select class="search_input" name="search_choice" id="seach_choice">
                        <option name="song" id="song" value="song">Song</option>
                        <option name="movie" id="movie" value="movie">Movie</option>
                    </select>
                    <input class="search_input" type="submit" name="submit" Value="Search"/>
                </form>
            </div>
            <div class="search_results_container">
                <?php
                    if (isset($_GET["movie"])) {
                        $search_text = $_GET['movie'];
                        $search_text = '%'.$search_text.'%';

                        $query = "SELECT tconst,primaryTitle FROM dnts.movies WHERE primaryTitle LIKE '$search_text'";
                        $result = $db->query($query);
                        $num = mysqli_num_rows($result);
                        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        $page = $_GET['page'];

                        echo "<div style='text-indent: 47vw; padding-bottom: 10px; color: orangered; font-size:22px;'>Movies</div>";
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
                    elseif (isset($_GET['song'])) {
                        $search_text = $_GET['song'];
                        $search_text = '%'.$search_text.'%';

                        $query = "SELECT song_id,song_title,performed_by FROM dnts.songs WHERE song_title LIKE '$search_text'";
                        $result = $db->query($query);
                        $num = mysqli_num_rows($result);
                        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        $page = $_GET['page'];

                        echo "<div style='text-indent: 47vw; padding-bottom: 10px; color: orangered; font-size: 22px;'>Songs</div>";
                        for ($i = ($page - 1) * $results_per_page; $i < ($page * $results_per_page); ++$i) {
                            if (isset($result[$i]['song_title'])) {
                                echo "<div class='search_results_title'><a style='text-decoration: none; color: inherit;' href='song.php?username=";
                                echo $username;
                                echo "&song=";
                                echo $result[$i]['song_title'];
                                echo "&page=1'>";
                                echo $result[$i]['song_title'];
                                echo "&nbsp;by&nbsp;";
                                echo $result[$i]['performed_by'];
                                echo "</a>";
                                echo "<br/>";
                                echo "</div>";
                            }
                        }
                    }
                    else {
                        echo "<div class='search_results_title'>Please search a song or a movie.<div>";
                    }
                ?>
            </div>
            <?php
                if (isset($_GET['total_pages'])) {
                    echo "<div class='page_nav'>";
                    if ($_GET['page'] > 1) {
                        echo "<button onclick=";
                        echo "location.href='home.php?username=$username";
                        if (isset($_GET['movie'])) {
                            echo "&movie=";
                            echo $_GET['movie'];
                        }
                        elseif (isset($_GET['song'])) {
                            echo "&song=";
                            echo $_GET['song'];
                        }
                        echo "&page=";
                        echo ($_GET['page'] - 1);
                        echo "&total_pages=";
                        echo $_GET['total_pages'];
                        echo "'>Previous</button>&nbsp;";
                    }
                    echo $_GET['page'];
                    echo "&nbsp;of&nbsp;";
                    echo $_GET['total_pages'];
                    if ($_GET['page'] < $_GET['total_pages']) {
                        echo "&nbsp;<button onclick=";
                        echo "location.href='home.php?username=$username";
                        if (isset($_GET['movie'])) {
                            echo "&movie=";
                            echo $_GET['movie'];
                        }
                        elseif (isset($_GET['song'])) {
                            echo "&song=";
                            echo $_GET['song'];
                        }
                        echo "&page=";
                        echo ($_GET['page'] + 1);
                        echo "&total_pages=";
                        echo $_GET['total_pages'];
                        echo "'>Next</button>";
                    }
                    echo "</div>";
                }
            ?>
        </div> 
    </body>
</html>