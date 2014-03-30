-- stovar
-- creacion de la base de datos proyect
CREATE DATABASE proyect;

-- utilizamos la base de datos proyect
USE proyect;

-- creamos la tabla users
CREATE TABLE IF NOT EXISTS users (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;

-- creamos la tabla views
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

-- creamos al usuario web y le asignamos permisos
CREATE USER 'web'@'localhost' IDENTIFIED BY '-Web123Pro-';
GRANT ALL PRIVILEGES ON proyect.* TO 'web'@'localhost';

-- ingresarmos usuarios
insert into users values(1,'xoco','252bf1fc9510ed5fd6cfefba5c320135fe406301','xoco@bec.seguridad.unam.mx',NOW(),1);
insert into users values(2,'stovar','b82d6e18a43885cc58558bf32192d3cfdc69be3c','stovar@bec.seguridad.unam.mx',NOW(),1);

-- ingresamos las primeras vistas
insert into views values(1,1,1);
insert into views values(1,2,2);
insert into views values(1,3,3);
insert into views values(1,4,4);
insert into views values(1,5,5);
insert into views values(1,6,6);
insert into views values(1,7,7);
insert into views values(1,8,8);
insert into views values(1,9,9);

