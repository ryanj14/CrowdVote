<?php
    require_once('mysqli_connect.php');
    include 'functions.php';

    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    id = 3 LIMIT 1";
    $list = connect();
    $rows = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows)
?>
<!DOCTYPE html>
<html>
<body>

<h2>User Created Questions</h2>

<?php echo $row['title']; ?>
<form>
    
    <?php
        echo "<input type='radio' name='choice' value='other'>" . $row['optionOne'] . "<br>";
    
        echo "<input type='radio' name='choice' value='other'>" . $row['optionTwo'] . "<br>";
    
        if($row['optionThree'] != NULL){
         echo "<input type='radio' name='choice' value='other'>" . $row['optionThree'] . "<br>";
        } 

        if($row['optionFour'] != NULL){
         echo "<input type='radio' name='choice' value='other'>" . $row['optionFour'] . "<br>";
        }
    
    ?>
    <input type="submit" name="submit" value="Submit">
</form> 

<br><br> 
<a href="index.php">Home</a>
    
</body>
</html>