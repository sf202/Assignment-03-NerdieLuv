<?php include("commontop.php"); ?>




<?php


if (isset($_GET["name"])) {
    $name = $_GET["name"];

    if (!preg_match('/\S/', $name)) {
        include("error.php");
        exit;
    }

    $userExists = false;
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $login) {
        if ($name == explode(",", $login)[0]) {
            $userExists = true;
            break;
        }
    }

    if (!$userExists) {
        include("error.php");
        exit;
    }
}

if (isset($_GET["name"])) {
    $name = $_GET["name"];
    // Validate name (not blank)
    if (!preg_match('/\S/', $name)) {
        include("error.php");
                exit;
    }
}


?>


<h1>Matches for <?= $_GET["name"] ?></h1>
<div class='match'>
    <?php identical(); ?>
</div>

<?php include("commonbottom.php"); ?>

<?php


function identical()
{
 
    $login = "";
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $login) {
        if ($_GET["name"] == explode(",", $login)[0]) {
            break;
        }
    }

    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $match) {
        if (
            explode(",", $match)[0] != explode(",", $login)[0]

            && explode(",", $match)[1] != explode(",", $login)[1]

            && explode(",", $match)[2] >= explode(",", $login)[5]
            && explode(",", $match)[2] <= explode(",", $login)[6]

            && explode(",", $match)[4] == explode(",", $login)[4]

      
            && (
                str_split(explode(",", $match)[3])[0] == str_split(explode(",", $login)[3])[0]
                || str_split(explode(",", $match)[3])[1] == str_split(explode(",", $login)[3])[1]
                || str_split(explode(",", $match)[3])[2] == str_split(explode(",", $login)[3])[2]
                || str_split(explode(",", $match)[3])[3] == str_split(explode(",", $login)[3])[3]
            )

        ) {
            ?>
            <p><img src='images/user.png' alt='user icon'><?= explode(",", $match)[0] ?></p>
            <ul>
                <li><strong>gender:</strong><?= explode(",", $match)[1] ?></li>
                <li><strong>age:</strong><?= explode(",", $match)[2] ?></li>
                <li><strong>type:</strong><?= explode(",", $match)[3] ?></li>
                <li><strong>OS:</strong><?= explode(",", $match)[4] ?></li>
            </ul>

        <?php }
    }
}

?>
