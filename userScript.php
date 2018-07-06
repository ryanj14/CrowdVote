<?php
    if(isset($_GET['submit']) && !empty($_GET['submit'])) {
        choice1();
        choice2();
        choice3();
        choice4();
        header("Location: userChoice.php"); 
    }

    /* Checks to see if radio button "choice1" is checked */
    function choice1() {
        if((isset($_GET['choice1'])) == true) {
            $picked = "oneVal";
            $_SESSION["choice"] = $_GET['choice1'];
            if (!isset($_SESSION["option"]) && empty($_SESSION['option'])) {
                $_SESSION["option"] = $picked;
            } 
        }
    }

    /* Checks to see if radio button "choice2" is checked */
    function choice2() {
        if((isset($_GET['choice2'])) == true) {
            $picked = "twoVal";
            $_SESSION["choice"] = $_GET['choice2'];
            option($picked);
        }
    }

    /* Checks to see if radio button "choice3" is checked */
    function choice3() {
        if((isset($_GET['choice3'])) == true) {
            $picked = "threeVal";
            $_SESSION["choice"] = $_GET['choice3'];
            if (!isset($_SESSION["option"]) && empty($_SESSION['option'])) {
                $_SESSION["option"] = $picked;
            }
        }
    }

    /* Checks to see if radio button "choice4" is checked */
    function choice4() {
        if((isset($_GET['choice4'])) == true) {
            $picked = "fourVal";
            $_SESSION["choice"] = $_GET['choice4'];
            option($picked);
        }
    }

    /* Session "option" select validation */
    function option($picked) {
        if (!isset($_SESSION["option"]) && empty($_SESSION['option'])) {
            $_SESSION["option"] = $picked;
        } 
    }
?>