CREATE DATABASE usuarios;

USE usuarios;

CREATE TABLE vistas (
  idvistas INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nodo INTEGER UNSIGNED  NOT NULL    ,
PRIMARY KEY(idvistas));


CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL DEFAULT '',
    password VARCHAR(255) NOT NULL DEFAULT '',
    email VARCHAR(255) NOT NULL DEFAULT '',
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    tip_user BOOLEAN  NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

CREATE TABLE users_has_vistas (
  users_id INTEGER UNSIGNED  NOT NULL  ,
  vistas_idvistas INTEGER UNSIGNED  NOT NULL    ,
PRIMARY KEY(users_id, vistas_idvistas)  ,
INDEX users_has_vistas_FKIndex1(users_id)  ,
INDEX users_has_vistas_FKIndex2(vistas_idvistas),
  FOREIGN KEY(users_id)
    REFERENCES users(id)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(vistas_idvistas)
    REFERENCES vistas(idvistas)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);


GRANT ALL ON usuarios.* TO 'admin'@'localhost' IDENTIFIED BY 'hola123,';
GRANT SELECT ON usuarios.* TO 'mortal'@'localhost' IDENTIFIED BY 'hola';




