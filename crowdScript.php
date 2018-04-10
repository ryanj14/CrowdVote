<?php
    require_once('mysqli_connect.php');
    include_once("functions.php");

    if(isset($_POST['submit'])) { 
        
        // Connecting to the database
        $list = connect();
        
        $titles  =    mysqli_real_escape_string($list, $_POST['title']);
        $ones    =    mysqli_real_escape_string($list, $_POST['option1']);
        $twos    =    mysqli_real_escape_string($list, $_POST['option2']);
        $threes  =    mysqli_real_escape_string($list, $_POST['option3']);
        $fours   =    mysqli_real_escape_string($list, $_POST['option4']); 
        
        $title = htmlentities($titles, ENT_QUOTES, "UTF-8");
        $one = htmlentities($ones, ENT_QUOTES, "UTF-8");
        $two = htmlentities($twos, ENT_QUOTES, "UTF-8");
        $three = htmlentities($threes, ENT_QUOTES, "UTF-8");
        $four = htmlentities($fours, ENT_QUOTES, "UTF-8");

        $sql = "INSERT INTO Crowd 
                    (id, title, optionOne, optionTwo, optionThree, optionFour)
                VALUES 
                    (NULL,'$title', '$one', '$two', '$three', '$four')";

        // Checks to see if it is actually adds it to the database
        sqlCheck($list, $sql);
    }
?>