<?php
    require_once('mysqli_connect.php');
    include_once("functions.php");

    if(isset($_POST['submit'])) { 
        
        // Connecting to the database
        $list = connect();
        
        $title  =    mysqli_real_escape_string($list, $_POST['title']);
        $one    =    mysqli_real_escape_string($list, $_POST['option1']);
        $two    =    mysqli_real_escape_string($list, $_POST['option2']);
        $three  =    mysqli_real_escape_string($list, $_POST['option3']);
        $four   =    mysqli_real_escape_string($list, $_POST['option4']); 

        $sql = "INSERT INTO Crowd 
                    (id, title, optionOne, optionTwo, optionThree, optionFour)
                VALUES 
                    (NULL,'$title', '$one', '$two', '$three', '$four')";

        // Checks to see if it is actually adds it to the database
        sqlCheck($list, $sql);
    }
?>