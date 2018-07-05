<!-- 
    user.php
    Author: Ryan Joseph
    Version: 1.2
    Date: 7/5/2018
    The page where the user can select an option
-->
<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';
    include 'userScript.php';
    ob_start();

    /* Establishing a connection to the database */
    $link = connect();
    
    /* Randomly select a row from the table */
    $results = "SELECT * FROM Crowd ORDER BY RAND() LIMIT 1"; 
    $rows = mysqli_query($link, $results);
    $row = mysqli_fetch_assoc($rows);

    if (!isset($_SESSION["title"])  && empty($_SESSION['title'])) {
        $_SESSION["title"] = $row['title'];
    }

    if (!isset($_SESSION["one"]) && empty($_SESSION['one'])) {
        $_SESSION["one"] = $row['optionOne'];
    }

    if (!isset($_SESSION["two"]) && empty($_SESSION['two'])) {
        $_SESSION["two"] = $row['optionTwo'];
    }

    if (!isset($_SESSION["three"])) {
        $_SESSION["three"] = $row['optionThree'];
    }

    if (!isset($_SESSION["four"])) {
        $_SESSION["four"] = $row['optionFour'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/base.css" type="text/css" title="Default">

        <title>Crowd Vote</title>

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
        
        <!-- Crowd Vote form validation -->
        <script type="text/javascript" src="formValidation.js"></script>
    </head>
<body id="user">

<div class="container-fluid">
    <h1 class="userH1"> <?php echo $row['title']; ?></h1>
    
    <div class="formInput row">
        <form name="selection" action=" " method="get" onsubmit="return validateRadio()">   
            <div class="form-check">
                <?php echo '<input class="form-check-input" type="radio" name="choice" value="'  
                . $row['optionOne'] .  '">' . $row['optionOne'] . "<br>"; ?>
            </div>
            <div class="form-check">
                <?php echo '<input class="form-check-input" type="radio" name="choice" value="' 
                . $row['optionTwo'] . '">' . $row['optionTwo'] . "<br>"; ?>
            </div>
            <?php
                if($row['optionThree'] != NULL){
                    echo '<div class="form-check">';
                        echo '<input type="radio" name="choice" value="' 
                        . $row['optionThree'] . '">' . $row['optionThree'] . "<br>";
                    echo '</div>';
                } 

                if($row['optionFour'] != NULL){
                    echo '<div class="form-check">';
                        echo '<input type="radio" name="choice" value="' 
                        . $row['optionFour'] . '">' . $row['optionFour'] . "<br>";
                    echo '</div>';
                }
                mysqli_close($link);
            ?>
            <div class="wrapper2">
                <input type="Submit" class="btn btn-default" name="submit" value="Vote">
                <a href="index.php" class="btn btn-default">Home</a>
            </div>
        </form> 
    </div>
</div>
</body>
</html>