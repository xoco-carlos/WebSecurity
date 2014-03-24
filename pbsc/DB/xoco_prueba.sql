CREATE DATABASE proyecto;
USE proyecto;
CREATE TABLE IF NOT EXISTS users (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS views (
  `userID` INT NOT NULL,
  `viewID` INT NOT NULL,
  PRIMARY KEY (`userID`, `viewID`),
  CONSTRAINT `fk_views_users`
    FOREIGN KEY (`userID`)
    REFERENCES `proyecto`.`users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
GRANT ALL ON usuarios.* TO 'admin'@'localhost' IDENTIFIED BY 'hola123,';
GRANT SELECT ON usuarios.* TO 'mortal'@'localhost' IDENTIFIED BY 'hola';
