<?php
    require_once('mysqli_connect.php');
    include 'functions.php';

    $title = $_GET['title'];
    $value = $_GET['value'];
    $option = $_GET['option'];

    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    title = '$title' LIMIT 1";

    $list = connect();
    $rows = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows);

    echo $value;
    echo $option;

    if(($value == $row['optionOne']) && ($option == 'oneVal')) {
        $selected = $row['oneVal'];
    } 

    if (($value == $row['optionTwo']) && ($option == 'twoVal')) {
        $selected = $row['twoVal'];    
    } 

    if (($value == $row['optionThree']) && ($option == 'threeVal')){
        $selected = $row['threeVal'];
    } 

    if (($value == $row['optionFour']) && ($option == 'fourVal')) {
        $selected = $row['fourVal'];
    }

    echo $selected . "<br>";

    $selected += 1;

    echo $selected;
    
    $sql2 = "
            UPDATE
                Crowd
            SET
                $option=$selected
            WHERE
                title = '$title'
                ";

    if (mysqli_query($list, $sql2)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($list);
    }
?>
<!DOCTYPE html>
<html>
<body>

<h2>Crowd Result</h2> 
    
<a href="user.php">User Thing</a>

</body>
</html>