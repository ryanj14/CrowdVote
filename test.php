<?php
 require_once('mysqli_connect.php');
    include 'functions.php';
    if(isset($_GET['submit'])) {
        
    $list = connect();
    $title = $_GET['title'];
    $value = $_GET['value'];
    $option = $_GET['option'];

    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    title = '$title' LIMIT 1";

    $rows = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows);
        
        $choice = $_GET['choice'];
        echo $choice;
        $four = $row['optionFour'];
        
        if($choice == $row['optionOne']){
            $picked = "oneVal";
        }
        
        if($choice == $row['optionTwo']){
            $picked = "twoVal";
        } 
        
        if($choice == $row['optionThree']){
            echo "Hi";
            $picked = "threeVal";
        } 
        
        if($choice == $row['optionFour']){
            $picked = "fourVal";
        } 

        echo $picked;
        
        header('Location: userChoice.php?title=' . $row['title'] . '&value=' . $choice . '&option=' . $picked); 
        
        mysqli_close($list);
    }
?>