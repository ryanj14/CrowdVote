<!-- 
    index.php
    Author: Ryan Joseph
    Version: 1.1
    Date: 6/25/2018 
-->
<!DOCTYPE html>
<html lang="en">   
    <head>
        <meta charset="utf-8">
        <meta name="Description" content="Crowd Vote landing page.">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <!-- CSS Files -->
        <link rel="stylesheet" href="css/base.css" type="text/css" title="Default">

        <title>Crowd Vote</title>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
            crossorigin="anonymous"
        >
        
        <!-- Crowd Vote form validation -->
        <script type="text/javascript" src="formValidation.js"></script>
    </head>
<body>
    <div class="container-fluid">
    <h1>Crowd Vote</h1>
        <div class="formInput row">
            <form   name="crowdForm" 
                    action="crowdScript.php"   
                    method="post" 
                    onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input name ="title" type="title" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                    <label for="option1">Option 1:</label>
                    <input name="option1" type="option1" class="form-control" id="option1" required>
                </div>
                <div class="form-group">
                    <label for="option2">Option 2:</label>
                    <input name="option2" type="option2" class="form-control" id="option2" required>
                </div>
                <div class="form-group">
                    <label for="option3">Option 3:</label>
                    <input name="option3" type="option3" class="form-control" id="option3">
                </div>
                <div class="form-group">
                    <label for="option4">Option 4:</label>
                    <input name="option4" type="option4" class="form-control" id="option4">
                </div>
                <div class="wrapper">
                    <input type="Submit" class="btn btn-default" name="Submit" value="Submit">
                    <a href="user.php" class="btn btn-default">Random Choice</a>
                </div>
            </form> 
        </div><!-- formInput row -->
    </div><!-- container-fluid -->
</body>
</html>