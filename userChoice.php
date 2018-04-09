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

    $selected += 1;
    
    $sql2 = "
            UPDATE
                Crowd
            SET
                $option=$selected
            WHERE
                title = '$title'
                ";

    if (!mysqli_query($list, $sql2)) {
        echo "Error updating record: " . mysqli_error($list);
    }
?>
<!DOCTYPE html>
<html>
<body>

<h2>Crowd Result</h2> 
    
<?php
    $count = $row['oneVal'] + $row['twoVal'] + $row['threeVal'] + $row['fourVal']; 
    echo $row['optionOne'] . ": " . floor(($row['oneVal'] * 100) / $count) . "%<br>";

    echo $row['optionTwo'] . ": " . floor(($row['twoVal'] * 100) / $count) . "%<br>";

    if($row['optionThree'] != NULL){
     echo $row['optionThree'] . ": " . floor(($row['threeVal'] * 100) / $count) . "%<br>";
    } 

    if($row['optionFour'] != NULL){
     echo $row['optionFour'] . ": " . floor(($row['fourVal'] * 100) / $count) . "%<br>";
    }
    echo "Total votes: " . $count;
?>
    
<a href="user.php">User Thing</a>

</body>
</html>