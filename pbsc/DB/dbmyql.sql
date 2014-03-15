CREATE DATABASE usuarios;

USE usuarios;

CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL DEFAULT '',
    password VARCHAR(255) NOT NULL DEFAULT '',
    email VARCHAR(255) NOT NULL DEFAULT '',
    created DATE NOT NULL DEFAULT '0000-00-00',
    vistas VARCHAR(255) NOT NULL DEFAULT '12-2-3-4-5-2-1-6-7',
    tip_user BOOLEAN  NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

GRANT ALL ON usuarios.* TO 'admin'@'localhost' IDENTIFIED BY 'hola123,';
GRANT SELECT ON usuarios.* TO 'mortal'@'localhost' IDENTIFIED BY 'hola';




