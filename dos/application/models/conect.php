<?php

    /*  Clase mySQLDB para acceder a base de datos mySQL */
    class conectmysql {
        const servidor = '127.0.0.1'; 
        const user  = 'admin'; 
        const passw    = 'hola123,';
        protected $IdConexion;
        protected $basedatos;
		
		/*En el constructor se incluye el código necesario para establecer la conexión*/
		function __construct() {
            $this->IdConexion = @mysql_connect(self::servidor, self::user, self::passw) 
                or die ('Imposible conectar con base de datos.');
        }

        function __destruct() {
            @mysql_close($this->IdConexion);
        }

		// "SetBaseDatos" asigna una base de datos por defecto a la conexión
        function SetBaseDatos() {
            $this->basedatos = usuarios; //$nombrebd
            @mysql_select_db( usuarios, $this->IdConexion);
        }

		// "GetConexion" devuelve el identificador de la conexión asociada a la BD
        function GetConexion() {
            return $this->IdConexion;
        }

		// "GetBaseDatos" permite recuperar el nombre de la base de datos por defecto
        function GetBaseDatos() {
            return $this->basedatos;
        }
    }

?>
