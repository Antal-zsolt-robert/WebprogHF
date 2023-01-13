<?php
session_start();

if (isset($_POST["submit"])) {
    $enterednumber = $_POST['talalgatas'];
    if (is_numeric($enterednumber) && $enterednumber >= 1 && $enterednumber <= 10) {
        if (!isset($_SESSION['generatedNumber'])) {
            generateRandom();
        }
        if ($_SESSION['generatedNumber'] < $enterednumber){
            echo "<label style='color: coral'>Nem talált! A szám kisebb mint " . $enterednumber . "</label><br><br>";
        }
        else if ($_SESSION['generatedNumber'] > $enterednumber){
            echo "<label style='color: coral'>Nem talált! A szám nagyobb mint " . $enterednumber . "</label><br><br>";
        }
        else{
            echo "<label style='color: green'>Talált!</label><br><br>";
            session_destroy();
        }
    } else {
        echo "<label style='color: red'>Helytelen szám! Kérjük adjon meg egy egész számot 1 és 10 között!</label><br><br>";
    }
}

function generateRandom(){
    $_SESSION['generatedNumber'] = rand(1,10);
}
?>

<form method="POST" action="index.php">
    <input type="hidden" name="elkuldott" value="true">
    Melyik számra gondoltam 1 és 10 között?
    <input name="talalgatas" type="number">
    <br>
    <br>
    <input type="submit" name="submit" value="Elküld">
</form>