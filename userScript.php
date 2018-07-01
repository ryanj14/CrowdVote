<?php
if(isset($_GET['submit'])) {

if (!isset($_SESSION["choice"])) {
        $_SESSION["choice"] = $_GET['choice'];
        $choice = $_SESSION["choice"];
}

if($_SESSION["choice"] == $_SESSION["one"]){
    $picked = "oneVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["two"]){
    $picked = "twoVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["three"]){
    $picked = "threeVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 

if($_SESSION["choice"] == $_SESSION["four"]){
    $picked = "fourVal";
    if (!isset($_SESSION["option"])) {
        $_SESSION["option"] = $picked;
    } 
} 
header("Location: userChoice.php"); 
}
ob_end_flush();
?>