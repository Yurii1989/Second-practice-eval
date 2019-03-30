<?php

require_once __DIR__.'/../src/Model/Lorry.php';
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editValues = ['brand' => $_POST['brand'], 'type' => $_POST['type'], 'horsePower' => $_POST['horsePower'],
        'payload' => $_POST['payload'], 'driverId' => $_POST['driverId']];
    var_dump($editValues);
    \Model\Lorry::update($_POST['lorryId'], $editValues);
    header('location: index.php');
}
?>

<form method="post">
    <label for="lorryId">Lorry Id</label>
    <input type="text" name="lorryId">
    <label for="brand">Brand</label>
    <input type="text" name="brand">
    <label for="type">Type</label>
    <input type="text" name="type">
    <label for="horsePower">Horsepower</label>
    <input type="text" name="horsePower">
    <label for="payload">Payload</label>
    <input type="text" name="payload">
    <label for="driverId">Driver Id</label>
    <input type="text" name="driverId">
    <button>Edit lorry</button>
</form>