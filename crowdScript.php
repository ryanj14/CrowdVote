<?php
    echo "Hi";
    require_once('mysqli_connect.php');
    include_once("functions.php");

    if(isset($_POST['submit'])) {     
        echo "from isset";
        $title  =    $_POST['title'];
        $one    =    $_POST['option1'];
        $two    =    $_POST['option2'];
        $three  =    $_POST['option3'];
        $four   =    $_POST['option4'];
        
        $three  =   !empty($three) ? "'$three'" : NULL;
        $four   =   !empty($four)  ? "'$four'"  : NULL;

        // Connecting to the database
        $list = connect();

        $sql = "INSERT INTO Crowd (id, title, optionOne, optionTwo, optionThree, optionFour)
        VALUES (NULL,'$title', '$one', '$two', '$three', '$four')";

        // Checks to see if it is actually adds it to the database
        sqlCheck($list, $sql);
    }
?>