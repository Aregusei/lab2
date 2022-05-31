<?php
require_once __DIR__."/vendor/autoload.php";

use MongoDB\Client;

$client = new \MongoDB\Client("mongodb://127.0.0.1/");
$team = $client->football->team;
$game = $client->football->game;

function showLeague()
{
    global $game;
    $statement = $game->distinct("league");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function showTeams()
{
    global $team;
    $statement = $team->distinct("title");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function findLeague($league)
{
    global $game;
    $statement = $game->find(["league" => $league]);
    echo "<div id='content'>";
    foreach ($statement as $data) {
        $date = date("Y-m-d", substr(strval($data["date"]), 0, -3));
        echo "Date: {$date}, Place: {$data['place']}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
    }
    echo "</div>";
}

function findGames($team)
{
    global $game;
    $statement = $game->find(['$or'=>[['team1'=>$team], ['team2'=>$team]]]);
    echo "<div id='content'>";
    foreach ($statement as $data) {
        $date = date("Y-m-d", substr(strval($data["date"]), 0, -3));
        echo "Date: {$date}, Place: {$data['place']}, Score: {$data['score']}, Team One: {$data['team1']}, Team Two: {$data['team2']}<br>";
    }
    echo "</div>";

}

function findPlayers($player)
{
    global $team;
    $statement = $team->find(["title" => $player]);
    echo "<div id='content'> Players:<br>";
    foreach ($statement->toArray()[0]['list'] as $data) {
        echo "$data<br>";
    }
    echo "</div>";
}

