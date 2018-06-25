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

        <!-- jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link   href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" 
                rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" 
                crossorigin="anonymous">

        <!-- Optional theme -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" 
                integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" 
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
                <div class="wrapper">
                    <input type="submit" class="btn btn-default" name="submit" value="Submit">
                    <a href="user.php" class="btn btn-default">Random Choice</a>
                </div>
            </form> 
        </div><!-- formInput row -->
    </div><!-- container-fluid -->
</body>
</html>