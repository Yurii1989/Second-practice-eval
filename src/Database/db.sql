CREATE DATABASE fleet;
USE fleet;

CREATE TABLE driver(
  id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  firstname varchar(255),
  lastname varchar(255)
) ENGINE InnoDB;

CREATE TABLE car(
  carId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  brand varchar(255),
  type varchar(255),
  horsePower int(10),
  driverId INT(10) UNSIGNED NOT NULL,
  FOREIGN KEY (driverId) REFERENCES driver(id)
) ENGINE InnoDB;

CREATE TABLE lorry(
  lorryId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  brand varchar(255),
  type varchar(255),
  horsePower int(10),
  payload int(10),
  driverId INT(10) UNSIGNED NOT NULL,
  FOREIGN KEY (driverId) REFERENCES driver(id)
) ENGINE InnoDB;