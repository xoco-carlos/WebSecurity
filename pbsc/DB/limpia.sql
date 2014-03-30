-- stovar
-- elimina de la base de datos proyect
REVOKE ALL ON *.* FROM 'web'@'localhost';
DROP USER web@localhost;
DROP DATABASE proyect;
