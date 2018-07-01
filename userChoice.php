<!-- 
    userChoice.php
    Author: Ryan Joseph
    Version: 1.1
    Date: 6/25/2018
    The page where the user can see their option results
-->
<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';

    $list = connect();

    if (isset($_SESSION["title"]) && !empty($_SESSION["title"])) {
        $title = mysqli_real_escape_string($list, $_SESSION["title"]);
    } else {
        header("Location: user.php"); 
    }

    if (isset($_SESSION["option"])) {
        $value = $_SESSION["option"];
    } else {
        echo "error";
    }

    if (isset($_SESSION["choice"])) {
        $option = $_SESSION["choice"];
    } else {
        echo "error";
    }

    if (isset($_SESSION["one"])) {
        $value1 = $_SESSION["one"];
    } else {
        echo "error";
    }

    if (isset($_SESSION["two"])) {
        $value2 = $_SESSION["two"];
    } else {
        echo "error";
    }
    
    if (isset($_SESSION["three"])) {
        $value3 = $_SESSION["three"];
    } else {
        echo "error";
    }

    if (isset($_SESSION["four"])) {
        $value4 = $_SESSION["four"];
    } else {
        echo "error";
    }

    
    unset($_SESSION["title"]);
    unset($_SESSION["option"]);
    unset($_SESSION["choice"]);
    unset($_SESSION["one"]);
    unset($_SESSION["two"]);
    unset($_SESSION["three"]);
    unset($_SESSION["four"]); 

    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    title = '$title' ";

    $rows2 = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows2);

    if(($option == $value1) && ($value == 'oneVal')) {
        $selected = $row['oneVal'];
    } 

    if (($option == $value2) && ($value == 'twoVal')) {
        $selected = $row['twoVal'];    
    } 

    if (($option == $value3) && ($value == 'threeVal')){
        $selected = $row['threeVal'];
    } 

    if (($option == $value4) && ($value == 'fourVal')) {
        $selected = $row['fourVal'];
    }

    $selected += 1;

    $sql2 = "
            UPDATE
                Crowd
            SET
                $value=$selected
            WHERE
                title = '$title' ";

    if (!mysqli_query($list, $sql2)) {
        echo "Error updating record: " . mysqli_error($list);
    }
    mysqli_close($list);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Crowd Vote</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/base.css" type="text/css" title="Default">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link   rel="stylesheet"  
                href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
                integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"     
                crossorigin="anonymous">

        <!-- Optional theme -->
        <link   rel="stylesheet"  
                href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
                integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
                crossorigin="anonymous">
    </head>
<body>

<main class="container-fluid">
<h1>Crowd Result</h1> 
<?php  
    $results2 = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    title = '$title' LIMIT 1";

    $list = connect();
    $rows = mysqli_query($list, $results2);
    $row = mysqli_fetch_assoc($rows);
    
    echo '<h2>' . $row['title'] . "</h2>";
    $count = $row['oneVal'] + $row['twoVal'] + $row['threeVal'] + $row['fourVal']; 
    echo $row['optionOne'] . ": " . floor(($row['oneVal'] * 100) / $count) . "%<br>";

    echo $row['optionTwo'] . ": " . floor(($row['twoVal'] * 100) / $count) . "%<br>";

    if($row['optionThree'] != NULL){
     echo $row['optionThree'] . ": " . floor(($row['threeVal'] * 100) / $count) . "%<br>";
    } 

    if($row['optionFour'] != NULL){
     echo $row['optionFour'] . ": " . floor(($row['fourVal'] * 100) / $count) . "%<br>";
    }
    echo "Total votes: " . $count . "<br>";
?>
</main>
    <div class="linkButtons">
        <a href="index.php">Home</a>
        <a href="user.php">Pick Another</a>
    </div>
</body>
</html>