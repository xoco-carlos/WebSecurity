CREATE DATABASE proyect;
USE proyect;
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
  `orden` INT NOT NULL,
  PRIMARY KEY (`userID`, `viewID`,`orden`),
  CONSTRAINT `fk_views_users`
    FOREIGN KEY (`userID`)
    REFERENCES `proyect`.`users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
GRANT ALL ON proyect.* TO 'admin'@'localhost' IDENTIFIED BY 'hola123,';
GRANT SELECT ON proyect.* TO 'mortal'@'localhost' IDENTIFIED BY 'hola';
