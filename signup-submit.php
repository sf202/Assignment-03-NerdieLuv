<?php include("commontop.php"); ?>


<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    if (!preg_match('/\S/', $name)) {
        include("error.php");
        exit;
    }

    $age = $_POST["age"];
    if (!is_numeric($age) || $age < 0 || $age > 99) {
        include("error.php");
        exit;
    }

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : ""; 

    if ($gender !== "M" && $gender !== "F") {
        include("error.php");
        exit;
    }
    

    $type = $_POST["type"];
    if (!preg_match('/^[IE][NS][TF][JP]$/', $type)) {
        include("error.php");
        exit;
    }

    $os = $_POST["OS"];
    $validOS = ["Windows", "Mac OS X", "Linux"];
    if (!in_array($os, $validOS)) {
        include("error.php");
        exit;
    }

    $min = $_POST["min"];
    $max = $_POST["max"];
    if (!is_numeric($min) || !is_numeric($max) || $min < 0 || $min > 99 || $max < 0 || $max > 99 || $min > $max) {
        include("error.php");
        exit;
    }

  
}
?>




<?php writeToFile(); ?>

<div>
    <h1>Thank you!</h1>
    <p>
        Welcome to NerdLuv, <?= $_POST["name"] ?>!<br/><br/>
        Now <a href="matches.php">log in to see your matches!</a>
    </p>
</div>


<?php include("commonbottom.php"); ?>

<?php

function writeToFile()
{
    $name = $_POST["name"];

    // Read the existing file
    $fileContents = file_get_contents("singles.txt");

    // Check if the user already exists
    $lines = explode("\n", $fileContents);
    foreach ($lines as $line) {
        $userInfo = explode(",", $line);
        if ($userInfo[0] === $name) {
            // User already exists, handle the error or prevent duplicate submission
            include("error.php");
            exit;
        }
    }

    // User doesn't exist, so write their information
    $userInfo = implode(",", $_POST);
    file_put_contents("singles.txt", "\n" . $userInfo, FILE_APPEND);
}

?>
