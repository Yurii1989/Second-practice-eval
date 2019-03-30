<?php
require_once __DIR__.'/../src/Model/Car.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editValues = ['brand' => $_POST['brand'], 'type' => $_POST['type'], 'horsePower' => $_POST['horsePower'],
        'driverId' => $_POST['driverId']];
    \Model\Car::update($_POST['carId'], $editValues);
    header('location: index.php');
}
?>

<form method="post">
    <label for="carId">Car Id</label>
    <input type="text" name="carId">
    <label for="brand">Brand</label>
    <input type="text" name="brand">
    <label for="type">Type</label>
    <input type="text" name="type">
    <label for="horsePower">Horsepower</label>
    <input type="text" name="horsePower">
    <label for="driverId">Driver Id</label>
    <input type="text" name="driverId">
    <button>Edit car</button>
</form>