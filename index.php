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

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/base.css" type="text/css" title="Default">

        <title>Crowd Vote</title>

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

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
                crossorigin="anonymous"></script>
        
        <!-- Crowd Vote form validation -->
        <script type="text/javascript" src="formValidation.js"></script>
    </head>
<body lang="en">

    <h1>Crowd Vote</h1>

    <div class="container-fluid">
        <div class="formInput row">
            <form   name="crowdForm" 
                    class="form-inline"
                    action="crowdScript.php"   
                    method="post" 
                    onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="title" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="option1">Option 1:</label>
                    <input type="option1" class="form-control" id="option1">
                </div>
                <div class="form-group">
                    <label for="option2">Option 2:</label>
                    <input type="option2" class="form-control" id="option2">
                </div>
                <div class="form-group">
                    <label for="option3">Option 3:</label>
                    <input type="option3" class="form-control" id="option3">
                </div>
                <div class="form-group">
                    <label for="option4">Option 4:</label>
                    <input type="option4" class="form-control" id="option4">
                </div>
                <br><br>
                <input type="submit" class="btn btn-default" name="submit" value="Submit">
            </form> 
        </div>
    </div>
    <br><br> 
    
    <a href="user.php">Random Choice</a>

</body>
</html>