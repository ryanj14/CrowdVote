<!-- 
    user.php
    Author: Ryan Joseph
    Version: 1.1
    Date: 6/25/2018
    The page where the user can select an option
-->
<?php
    session_start();
    require_once('mysqli_connect.php');
    include 'functions.php';
    ob_start();

    $list = connect();

    $sql = "SELECT 
                    * 
                FROM 
                    Crowd";

    $cnt = mysqli_query($list, $sql);
    $row_cnt = mysqli_num_rows($cnt);

    function ran($row_cnt){
        $rand = rand(1, $row_cnt);
        return array('number1' => $rand);
    }

    $bb = ran($row_cnt);
    $b = $bb['number1'];
    
    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                ORDER BY RAND() LIMIT 1";
    
    
    $rows = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows);

    if (!isset($_SESSION["title"])) {
        $_SESSION["title"] = $row['title'];
    }

    if (!isset($_SESSION["one"])) {
        $_SESSION["one"] = $row['optionOne'];
    }

    if (!isset($_SESSION["two"])) {
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
<html>
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
<body lang="en">

<div class="container-fluid">

<?php echo '<h1>' . $row['title'] . '</h1>'; ?>
    
<form name="selection" action=" " class="userForm" method="get" onsubmit="return validateRadio()">   
    <div class="form-check">
        <?php echo '<input class="form-check-input" type="radio" name="choice" value="'  . $row['optionOne'] .  '">' . $row['optionOne'] . "<br>"; ?>
    </div>
    <div class="form-check">
        <?php echo '<input class="form-check-input" type="radio" name="choice" value="' . $row['optionTwo'] . '">' . $row['optionTwo'] . "<br>"; ?>
    </div>
    <?php
        if($row['optionThree'] != NULL){
            echo '<div class="form-check">';
                echo '<input type="radio" name="choice" value="' . $row['optionThree'] . '">' . $row['optionThree'] . "<br>";
            echo '</div>';
        } 

        if($row['optionFour'] != NULL){
            echo '<div class="form-check">';
                echo '<input type="radio" name="choice" value="' . $row['optionFour'] . '">' . $row['optionFour'] . "<br>";
            echo '</div>';
        }
    ?>
    <div class="wrapper2">
        <input type="submit" class="btn btn-default" name="submit" value="Vote">
    </div>
    <a href="index.php" class="btn btn-default">Home</a>
</form> 
</div>
</body>
</html>

<?
if(isset($_GET['submit'])) {

if (!isset($_SESSION["choice"])) {
        $_SESSION["choice"] = $_GET['choice'];
        $choice = $_SESSION["choice"];
}

if($_SESSION["choice"] == $_SESSION["one"]){
    $picked = "oneVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["two"]){
    $picked = "twoVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["three"]){
    $picked = "threeVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["four"]){
    $picked = "fourVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 
header("Location: userChoice.php"); 
}
ob_end_flush();
?>