<?php
    if(isset($_GET['submit']) && !empty($_GET['submit'])) {
        if((isset($_GET['choice1'])) == true) {
            $picked = "oneVal";
            $_SESSION["choice"] = $_GET['choice1'];
            if (!isset($_SESSION["option"])) {
                $_SESSION["option"] = $picked;
            } 
        }
        if((isset($_GET['choice2'])) == true) {
            $picked = "twoVal";
            $_SESSION["choice"] = $_GET['choice2'];
            if (!isset($_SESSION["option"])) {
                $_SESSION["option"] = $picked;
            } 
        }
        if((isset($_GET['choice3'])) == true) {
            $picked = "threeVal";
            $_SESSION["choice"] = $_GET['choice3'];
            if (!isset($_SESSION["option"])) {
                $_SESSION["option"] = $picked;
            }
        }
        if((isset($_GET['choice4'])) == true) {
            $picked = "fourVal";
            $_SESSION["choice"] = $_GET['choice4'];
            if (!isset($_SESSION["option"])) {
                $_SESSION["option"] = $picked;
            } 
        }
        header("Location: userChoice.php"); 
    }
    ob_end_flush();
?>