<?php
/**
 * Adds 2 drivers(2 new objects) into DB if none exists
 */

require_once __DIR__.'/../src/Model/Driver.php';

$data = \Model\Driver::readAll();
var_dump($data);

if (empty($data)) {
    foreach ([['Mike', 'Jackson'], ['Bob', 'Marley']] as $value) {
    new Model\Driver($value[0], $value[1]);
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('INSERT INTO driver(firstname, lastname) 
                  VALUE (:firstname, :lastname)');
            $stmt->bindParam('firstname', $value[0]);
            $stmt->bindParam('lastname', $value[1]);
        $stmt->execute();
    }
} else {
    header('location: index.php');
}