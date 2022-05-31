<?php
require_once __DIR__ . "/dbAccess.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src = "script.js"></script>
    <title>Mongo</title>
</head>
<body style="display: flex">

<div class="forms">
    <form action="" method="post">
        <select name="league">
            <?php
            showLeague();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post">
        <select name="player">
            <?php
            showTeams();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
    <br>
    <form action="" method="post">
        <select name="team">
            <?php
            showTeams();
            ?>
        </select>
        <input type="submit" value="Submit"><br>
    </form>
</div>

<div class="content" style="display: block; border: 1px solid black; margin-left: 300px; padding: 20px">
    <?php
    if (isset($_POST["league"])) {
        findLeague($_POST["league"]);
    } elseif (isset($_POST["player"])) {
        findPlayers($_POST["player"]);
    } elseif (isset($_POST["team"])) {
        findGames($_POST["team"]);
    }
    ?>
    <hr>
    <div id="saved"></div>
    <button onclick="SaveContent()">Save Content</button>
    <button onclick="ShowContent()">Show Content</button>
</div>
</body>
</html>
