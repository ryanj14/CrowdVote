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
        echo "error: option\n";
        echo "Option: " . $_SESSION["option"];
    }

    if (isset($_SESSION["choice"])) {
        $option = mysqli_real_escape_string($list, $_SESSION["choice"]);
    } else {
        echo "error: choice\n";
    }

    if (isset($_SESSION["one"])) {
        $value1 = mysqli_real_escape_string($list, $_SESSION["one"]);
    } else {
        echo "error: one\n";
    }

    if (isset($_SESSION["two"])) {
        $value2 = mysqli_real_escape_string($list, $_SESSION["two"]);
    } else {
        echo "error: two\n";
    }
    
    if (isset($_SESSION["three"])) {
        $value3 = mysqli_real_escape_string($list, $_SESSION["three"]);
    } else {
        echo "error: three\n";
    }

    if (isset($_SESSION["four"])) {
        $value4 = mysqli_real_escape_string($list, $_SESSION["four"]);
    } else {
        echo "error: four\n";
    }
    
    unset($_SESSION["title"]);
    unset($_SESSION["option"]);
    unset($_SESSION["choice"]);
    unset($_SESSION["one"]);
    unset($_SESSION["two"]);
    unset($_SESSION["three"]);
    unset($_SESSION["four"]); 

    $query = "SELECT * FROM Crowd WHERE title LIKE ? LIMIT 1"; 
    
    /* create a prepared statement  */
    if ($stmt = mysqli_prepare($list, $query)) {

        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt, "s", $title);

        /* execute query */
        mysqli_stmt_execute($stmt);

        $results = mysqli_stmt_get_result($stmt);

        $row = mysqli_fetch_assoc($results);
    } else {
        echo "Error with prepare statement!\n";
        mysqli_close($list);
        die();
    } 

    if (($option == $value1) && ($value == 'oneVal')) {
        $selected = $row['oneVal'];
    } 

    if (($option == $value2) && ($value == 'twoVal')) {
        $selected = $row['twoVal'];    
    } 

    if (($option == $value3) && ($value == 'threeVal')) {
        $selected = $row['threeVal'];
    } 

    if (($option == $value4) && ($value == 'fourVal')) {
        $selected = $row['fourVal'];
    }

    $selected += 1;

    $sql2 = "UPDATE
                Crowd
            SET
                $value = $selected
            WHERE
                title = '$title' LIMIT 1";

    if (!mysqli_query($list, $sql2)) {
        echo "Error updating record: " . mysqli_error($list);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($list);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="Crowd Vote results page.">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Crowd Vote</title>

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/base.css" type="text/css" title="Default">

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
        crossorigin="anonymous"
        >
    </head>
<body>

<main>
<h1>Crowd Results</h1> 
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

    echo '<div class="results">';
        echo '<p>' .  $row['optionOne'] . ':</p>';
        echo '<p>' . floor(($row['oneVal'] * 100) / $count) . '%</p>';
    echo '</div>';

    echo '<div class="results">';
        echo '<p>' .  $row['optionTwo'] . ':</p>';
        echo '<p>' . floor(($row['twoVal'] * 100) / $count) . '%</p>';
    echo '</div>';

    if($row['optionThree'] != NULL){
        echo '<div class="results">';
            echo '<p>' .  $row['optionThree'] . ':</p>';
            echo '<p>' . floor(($row['threeVal'] * 100) / $count) . '%</p>';
        echo '</div>';
    } 

    if($row['optionFour'] != NULL){
     echo '<div class="results">';
        echo '<p>' .  $row['optionFour'] . ':</p>';
        echo '<p>' . floor(($row['fourVal'] * 100) / $count) . '%</p>';
    echo '</div>';
    }

     /* close statement */
     mysqli_close($list);
?>
    <div class="tally">
        <?php echo "Total votes: " . $count . "<br>"; ?>
    </div>

</main>
    <div class="linkButtons">
        <a href="index.php">Home</a>
        <a href="user.php">Pick Another</a>
    </div>
</body>
</html>