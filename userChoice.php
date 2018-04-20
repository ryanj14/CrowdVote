<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';

    $list = connect();

    if (isset($_SESSION["title"])) {
        $title = mysqli_real_escape_string($list, $_SESSION["title"]);
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
<html>
    
    <head>
        <title>Crowd Vote</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>
    
<body>

<h2>Crowd Result</h2> 
    
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
    
    echo $row['title']. "<br>";
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
    <br>
    <a href="index.php">Home</a>
    <a href="user.php">Pick Another</a>

</body>
</html>