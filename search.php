<?php include "dbinfo.inc";
    $results_per_page = 20;
    $username = $_GET['username'];

    if ($_POST['search_choice'] == 'song') {
        $search_text = htmlspecialchars(trim($_POST["search"]));
        $search_text = '%'.$search_text.'%';

        $query = "SELECT song_id,song_title,performed_by FROM dnts.songs WHERE song_title LIKE '$search_text'";
        $result = $db->query($query);
        $num = mysqli_num_rows($result);

        $total_pages = ceil($num / $results_per_page);

        header("Location: home.php?username=$username&song=$search_text&page=1&total_pages=$total_pages");
    }
    elseif ($_POST['search_choice'] == 'movie') {
        $search_text = htmlspecialchars(trim($_POST["search"]));
        $search_text = '%'.$search_text.'%';

        $query = "SELECT tconst,primaryTitle FROM dnts.movies WHERE primaryTitle LIKE '$search_text'";
        $result = $db->query($query);
        $num = mysqli_num_rows($result);

        $total_pages = ceil($num / $results_per_page);

        header("Location: home.php?username=$username&movie=$search_text&page=1&total_pages=$total_pages");
    }
    else {
        echo "An error has occurred.";
    }

?>