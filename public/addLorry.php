<?php

require_once __DIR__.'/../src/Model/Lorry.php';
require_once __DIR__.'/../src/Model/Factory.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $car = new \Model\Factory();
    $instance = $car->getLorryInstance($_POST);
    $a = $instance->getBrand();
    $b = $instance->getType();
    $c = $instance->getHorsepower();
    $d = $instance->getPayload();
    $e = $instance->getDriverId();
    $array = ['brand' => $a, 'type' => $b, 'horsepower' => $c, 'payload' => $d, 'driverId' => $e];
    $instance->create($array);
    header('location: index.php');
}
?>

<form method="post">
    <label for="brand">Brand</label>
    <input type="text" name="brand">
    <label for="type">Type</label>
    <input type="text" name="type">
    <label for="horsepower">Horsepower</label>
    <input type="text" name="horsepower">
    <label for="payload">Payload</label>
    <input type="text" name="payload">
    <label for="driverId">Driver Id</label>
    <input type="text" name="driverId">
    <button>Add car</button>
</form>