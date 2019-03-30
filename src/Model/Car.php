<?php
namespace Model;
require_once __DIR__.'/Driver.php';

class Car extends Driver
{
    private $carId;
    private $brand;
    private $type;
    private $horsepower;
    private $driverId;

    public function __construct($brand, $type, $horsepower, $driverId)
    {
        $this->brand = $brand;
        $this->type = $type;
        $this->horsepower = $horsepower;
        $this->driverId = $driverId;
    }

    public function getBrand()
    {
        return $this->brand;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getHorsepower()
    {
        return $this->horsepower;
    }
    public function getDriverId()
    {
        return $this->driverId;
    }

    public static function create(array $carValues): int
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('INSERT INTO car(brand, type, horsePower, driverId) 
                  VALUE (:brand, :type, :horsepower, :driverId)');
        foreach (['brand', 'type', 'horsepower', 'driverId'] as $value) {
            $stmt->bindParam($value, $carValues[$value]);
            }
        $stmt->execute();
        return $connection->lastInsertId();
    }

    public static function read($id) {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
		$stmt = $connection->prepare('SELECT * FROM car WHERE carId=:id');
		$stmt->bindParam('id', $id);
		$stmt->execute();
		return $stmt->fetch();
	}

    public static function readAll() {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
		$stmt = $connection->prepare('SELECT * FROM car');
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}

    public static function delete(int $id): bool
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('DELETE FROM car WHERE carId = :id');
        $stmt->bindParam('id', $id);
        return $stmt->execute();
    }

    public static function update(int $id, array $editValues): bool
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('UPDATE car SET brand = :brand,
                         type = :type,
                         horsePower = :horsePower,
                         driverId = :driverId
                         WHERE carId = :id');
        $stmt->bindParam('id', $id);
        foreach (['brand', 'type', 'horsePower', 'driverId'] as $value) {
            $stmt->bindParam($value, $editValues[$value]);
        }
        return $stmt->execute();
    }

}