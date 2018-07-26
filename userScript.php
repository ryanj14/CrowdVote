<?php
    require_once('mysqli_connect.php');

    if(isset($_GET['submit']) && !empty($_GET['submit'])) {
        /* Establishing a connection to the database */
        $link = connect();
        choice($link);
        header("Location: userChoice.php"); 
    }

    /* Checks to see if radio button "choice" is checked */
    function choice($link) {
        if((isset($_GET['choice'])) == true) {
            $selected = $_GET['choice'];
            $row = scanChoice($link);
            $picked = searchCol($row, $selected);
            $_SESSION["choice"] = $selected;
            if (!isset($_SESSION["option"]) && empty($_SESSION['option'])) {
                $_SESSION["option"] = $picked;
            } 
        }
    }

    function scanChoice($link) {
        $title = $_SESSION["title"];

        $query = "SELECT * FROM Crowd WHERE title LIKE ? LIMIT 1"; 
    
        /* Creating a prepared statement  */
        if ($stmt = mysqli_prepare($link, $query)) {
    
            /* Bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $title);
    
            /* Execute query */
            mysqli_stmt_execute($stmt);

            $results = mysqli_stmt_get_result($stmt);

            $row = mysqli_fetch_assoc($results);

            /* Closing the prepared statement */
            mysqli_stmt_close($stmt);

            /* Freeing up memory associated with the query */
            mysqli_free_result($results);

            /* Closing connection to the database */
            mysqli_close($link);

            return $row;
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($link);
            die();
        }
    }

    function searchCol($row, $selected) {
        if($row['optionOne'] == $selected) {
            return "oneVal";
        } 
        if($row['optionTwo'] == $selected) {
            return "twoVal";
        }
        if($row['optionThree'] == $selected) {
            return "threeVal";
        }
        if($row['optionFour'] == $selected) {
            return "fourVal";
        }
    }
?>