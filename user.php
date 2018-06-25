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
        <title>Crowd Vote</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <!-- Crowd Vote form validation -->
        <script type="text/javascript" src="formValidation.js"></script>
    </head>
    
<body>

<h2>User Created Questions</h2>

<?php echo $row['title']; ?>
    
<form name="selection" action=" " method="get" onsubmit="return validateRadio()">
    
    <?php
        echo '<input type="radio" name="choice" value="'  . $row['optionOne'] .  '">' . $row['optionOne'] . "<br>";
    
        echo '<input type="radio" name="choice" value="' . $row['optionTwo'] . '">' . $row['optionTwo'] . "<br>";
    
        if($row['optionThree'] != NULL){
         echo '<input type="radio" name="choice" value="' . $row['optionThree'] . '">' . $row['optionThree'] . "<br>";
        } 

        if($row['optionFour'] != NULL){
         echo '<input type="radio" name="choice" value="' . $row['optionFour'] . '">' . $row['optionFour'] . "<br>";
        }
    
    
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
    <input type="submit" name="submit" value="Submit">
</form> 

<br><br> 
<a href="index.php">Home</a>
    
</body>
</html>