<?php
require_once __DIR__.'/../src/Model/Driver.php';

$data = \Model\Driver::readAllCars();
$dataLorries = \Model\Driver::readAllLorries();

echo "<ul style='list-style: none; display: flex;'><li style='margin: 5px;'><a href='addCar.php'>Add new car</a></li>";
echo "<li style='margin: 5px;'><a href='addLorry.php'>Add new lorry</a></li>";
echo "<li style='margin: 5px;'><a href='deleteCar.php'>Delete a car</a></li>";
echo "<li style='margin: 5px;'><a href='deleteLorry.php'>Delete a lorry</a></li>";
echo "<li style='margin: 5px;'><a href='editCar.php'>Edit a car</a></li>";
echo "<li style='margin: 5px;'><a href='editLorry.php'>Edit a lorry</a></li>";
echo "<li style='margin: 5px;'><a href='seeCar.php'>See a car by id</a></li>";
echo "<li style='margin: 5px;'><a href='seeLorry.php'>See a lorry by id</a></li></ul>";

echo "<a href='addDriver.php'>Add 2 drivers</a>";

echo "<h2>Cars per Owner</h2>";
echo "<table ><tr>
                <th>id</th>
                <th>firstname</th>
                <th>secondname</th>
                 <th>car-id</th>
                <th>car-brand</th>
                <th>car-type</th>
                <th>car-horsepower</th>
            </tr>";
foreach ($data as $datum) {
    echo "<tr>
            <td>".$datum->id."</td>
            <td>".$datum->firstname."</td>
            <td>".$datum->lastname."</td>
            <td>".$datum->carId."</td>
            <td>".$datum->brand."</td>
            <td>".$datum->type."</td>
            <td>".$datum->horsePower."</td>
            </tr>";
}
echo "</table>";


echo "<h2>Lorries per Owner</h2>";
echo "<table ><tr>
                <th>id</th>
                <th>firstname</th>
                <th>secondname</th>
                 <th>car-id</th>
                <th>car-brand</th>
                <th>car-type</th>
                <th>car-horsepower</th>
                <th>car-payload</th>
            </tr>";
foreach ($dataLorries as $datumLorry) {
    echo "<tr>
            <td>".$datumLorry->id."</td>
            <td>".$datumLorry->firstname."</td>
            <td>".$datumLorry->lastname."</td>
            <td>".$datumLorry->lorryId."</td>
            <td>".$datumLorry->brand."</td>
            <td>".$datumLorry->type."</td>
            <td>".$datumLorry->horsePower."</td>
            <td>".$datumLorry->payload."</td>
            </tr>";
}



