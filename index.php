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

<h2>Crowd Vote</h2>

<form name="crowdForm" action="crowdScript.php" method="post" onsubmit="return validateForm()">
    Title:<br>
    <input type="text" name="title">
    <br>
    Option 1:<br>
    <input type="text" name="option1">
    <br>
    Option 2:<br>
    <input type="text" name="option2">
    <br>
    Option 3:<br>
    <input type="text" name="option3">
    <br>
    Option 4:<br>
    <input type="text" name="option4">
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form> 
<br><br> 
    
<a href="user.php">User Thing</a>

</body>
</html>