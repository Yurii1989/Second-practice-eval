<?php
namespace Model;

class Driver
{
    private $id;
    private $firstname;
    private $lastname;

    public function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }

    public static function readAll() {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('SELECT * FROM driver');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function readAllCars() {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('SELECT * FROM driver LEFT JOIN car as C on driver.id = C.driverId');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public static function readAllLorries() {
        $connection = new \PDO('mysql:host=localhost;dbname=fleet;port=3306', 'root');
        $stmt = $connection->prepare('SELECT * FROM driver LEFT JOIN lorry as L on driver.id = L.driverId');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}