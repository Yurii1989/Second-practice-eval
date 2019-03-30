<?php

require_once __DIR__.'/../src/Model/car.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = \Model\Car::read($_POST['carId']);
    echo "carId: ".$data[0].", car brand: ".$data[1].", car type: ".$data[2].", car horsepower: ".$data[3]
        .", car ownerId: ".$data[4];
}


?>
<form method="post">
    <label for="carId">Car Id to see the details</label>
    <input type="text" name="carId">
    <button>See the car</button>
</form>
<a href='index.php'>Go to main page</a>