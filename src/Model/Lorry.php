<?php
namespace Model;
require_once __DIR__.'/Driver.php';

class Lorry extends Driver
{
    private $lorryId;
    private $brand;
    private $type;
    private $horsepower;
    private $payload;
    private $driverId;

    public function __construct($brand, $type, $horsepower, $payload, $driverId)
    {
        $this->brand = $brand;
        $this->type = $type;
        $this->horsepower = $horsepower;
        $this->payload = $payload;
        $this->driverId = $driverId;
    }

    public static function create(array $carValues): int
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('INSERT INTO lorry(brand, type, horsePower, payload, driverId) 
                  VALUE (:brand, :type, :horsepower, :payload, :driverId)');
        foreach (['brand', 'type', 'horsepower', 'driverId', 'payload'] as $value) {
            $stmt->bindParam($value, $carValues[$value]);
        }
        $stmt->execute();
        return $connection->lastInsertId();
    }

    public static function delete(int $id): bool
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('DELETE FROM lorry WHERE lorryId = :id');
        $stmt->bindParam('id', $id);
        return $stmt->execute();
    }

    public static function update(int $id, array $editValues): bool
    {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('UPDATE lorry SET brand = :brand,
                         type = :type,
                         horsePower = :horsePower,
                         payload = :payload,
                         driverId = :driverId
                         WHERE lorryId = :id');
        $stmt->bindParam('id', $id);
        foreach (['brand', 'type', 'horsePower', 'payload', 'driverId'] as $value) {
            $stmt->bindParam($value, $editValues[$value]);
        }
        return $stmt->execute();
    }

    public static function readAll() {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('SELECT * FROM lorry');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function read($id) {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('SELECT * FROM lorry WHERE lorryId=:id');
        $stmt->bindParam('id', $id);
        $stmt->execute();
        return $stmt->fetch();
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
    public  function getPayload()
    {
        return $this->payload;
    }
    public function getDriverId()
    {
        return $this->driverId;
    }

}