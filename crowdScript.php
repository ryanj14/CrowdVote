<?php
    require_once('mysqli_connect.php');
    include_once("functions.php");

    if(isset($_POST['Submit']) && !empty($_POST['Submit'])) { 
        
        // Connecting to the database
        $list = connect();
        
        $title  =    $_POST['title'];
        $one    =    $_POST['option1'];
        $two    =    $_POST['option2'];
        $three  =    $_POST['option3'];
        $four   =    $_POST['option4']; 

        $query = "INSERT INTO Crowd 
                    (id, `title`, `optionOne`, `optionTwo`, `optionThree`, `optionFour`)
                  VALUES 
                    (NULL, ?, ?, ?, ?, ?)";

        /* create a prepared statement */
        if ($stmt = mysqli_prepare($list, $query)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "sssss", $title, $one, $two, $three, $four);

            /* execute query */
            mysqli_stmt_execute($stmt);

            /* Freeing memory associated with the results */
            mysqli_free_result($stmt);

            /* close statement */
            mysqli_stmt_close($stmt);
            
            /* Closing the connection to the database */
            mysqli_close($list);

            /* Redirects the user to the home page */
            header("Location: index.php"); 
        } else {
            echo "Error with prepare statement!\n";

            /* Closing the connection to the database */
            mysqli_close($list);
            die();
        }
    } else {
        echo "HTML error\n";
    }
?>