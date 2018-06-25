<!-- 
    index.php
    Author: Ryan Joseph
    Version: 1.1
    Date: 6/25/2018 
-->
<!DOCTYPE html>
<html>   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Crowd Vote</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
                                integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"     
                                crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
                                integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
                                crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
                crossorigin="anonymous"></script>
        
        <!-- Crowd Vote form validation -->
        <script type="text/javascript" src="formValidation.js"></script>
    </head>
    
<body lang="en">

    <h1>Crowd Vote</h1>

    <form   name="crowdForm" 
            action="crowdScript.php"   
            method="post" 
            onsubmit="return validateForm()">
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
    
    <a href="user.php">Random Choice</a>

</body>
</html>