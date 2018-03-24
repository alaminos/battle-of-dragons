<?php
require 'class_dragon.php';
session_start();

const COLORS = [
    'red',
    'blue',
    'green',
    'pink',
    'purple',
    'orange',
    'grey'
];

const POWERS = [
    'fire',
    'thunder',
    'gravity',
    'glacial',
    'mathematics',
    'water',
    'earth'
];

function receive_user_data() {
    if (count($_POST) > 0) {
        createDragon($_POST['name']);
    }
}

function createDragon($name) {
    $power = POWERS[rand(0, count(POWERS)-1)];
    $color = COLORS[rand(0, count(COLORS)-1)];
    if (!(isset($_SESSION['dragons']))) { $_SESSION['dragons'] = [];}
    $_SESSION['dragons'][$name] = (new Dragon($name, $power, $color));
}

function echoDragons() {
    if (isset($_SESSION['dragons'])) {
        echo '<table>
                <tr>
                <th>Name</th>
                <th>Power</th>
                <th>Color</th>
                <th>Energy</th>
                </tr>'; 
        foreach ($_SESSION['dragons'] as $dragon) {
            echo '<tr>';
            foreach ($dragon as $val => $k) {
                echo '<td>' . $k . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}


receive_user_data();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>New Dragon</title>
</head>
<body>
    <h1>Create new dragon</h1>
    <form action="" method='post'>
        <label for="name">Name</label>
        <input type="text" max='30' name='name'>
        <button type="submit">Create</button>
    </form>
    
    <?= echoDragons();?>
    <div>Start combat, click <a href="index.php">here</a>. </div>
</body>
</html>