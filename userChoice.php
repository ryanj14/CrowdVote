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

<h2>Crowd Result</h2> 
    
<?php
    echo $_GET['title']. "<br>";
    echo $_GET['value'] . "<br>";
    echo $_GET['option'] . "<br>";
?>
    
<a href="user.php">User Thing</a>

</body>
</html>