<?php
    require_once('mysqli_connect.php');
    include 'functions.php';

    $results = "SELECT 
                    * 
                FROM 
                    Crowd
                WHERE
                    id = 1 LIMIT 1";
    $list = connect();
    $rows = mysqli_query($list, $results);
    $row = mysqli_fetch_assoc($rows)
?>
<!DOCTYPE html>
<html>
<body>

<h2>User Created Questions</h2>

<?php echo $row['title']; ?>
    
<form action=" " method="get">
    
    <?php
        echo '<input type="radio" name="choice" value="'  . $row['optionOne'] .  '">' . $row['optionOne'] . "<br>";
    
        echo '<input type="radio" name="choice" value=" ' . $row['optionTwo'] . ' ">' . $row['optionTwo'] . "<br>";
    
        if($row['optionThree'] != NULL){
         echo '<input type="radio" name="choice" value=" ' . $row['optionThree'] . ' ">' . $row['optionThree'] . "<br>";
        } 

        if($row['optionFour'] != NULL){
         echo '<input type="radio" name="choice" value=" ' . $row['optionFour'] . ' ">' . $row['optionFour'] . "<br>";
        }
    
    ?>
    <input type="submit" name="submit" value="Submit">
</form> 
    
<?php
    if(isset($_GET['submit'])) {
        
        $choice = $_GET['choice'];
        
        if($choice == $row['optionOne']){
            $picked = "oneVal";
        } else if($choice == $row['optionTwo']){
            $picked = "twoVal";
        } else if ($choice == $row['optionThree']){
            $picked = "threeVal";
        } else  if ($choice == $row['optionFour']){
            $picked = "fourVal";
        } else {
            echo "Error";
        }
        
        header('Location: userChoice.php?title=' . $row['title'] . '&value=' . $choice . '&option=' . $picked);
        
        mysqli_close($list);
    }
?>

<br><br> 
<a href="index.php">Home</a>
    
</body>
</html>