<?php

require_once __DIR__.'/../src/Model/Car.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    \Model\Car::delete(intval($_POST['carId']));
    header('location: index.php');
}

?>

<form method="post">
    <label for="carId">Car Id to delete</label>
    <input type="text" name="carId">
    <button>Delete car</button>
</form>
