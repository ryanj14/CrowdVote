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

        /* create a prepared statement */
        if ($stmt = mysqli_prepare($list, 
               "INSERT INTO Crowd 
                    (id, `title`, `optionOne`, `optionTwo`, `optionThree`, `optionFour`)
                VALUES 
                    (NULL, ?, ?, ?, ?, ?)")) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "sssss", $title, $one, $two, $three, $four);

            /* execute query */
            mysqli_stmt_execute($stmt);

            /* close statement */
            mysqli_stmt_close($stmt);
            
            mysqli_close($list);
            header('Location: index.php');
        } else {
            echo "Error with prepare statement!\n";
            mysqli_close($list);
            die();
        }
    } else {
        echo "HTML error\n";
    }
?>