<?
class querymysql {
        protected $BD;
        protected $Id;

        function __construct( $Bd, $Query ) {
            $this->BD = $Bd;
            $this->Id = @mysql_query( $Query, $this->BD->GetConexion() );
        }
		
// "Destruct" libera los resultados asociados a la consulta
        function __destruct() {
            @mysql_free_result($this->Id);
        }
		
/* "Cerrar" permite liberar los resultados de la consulta cuando sea necesario.
P.e., no será posible hacer una consulta en una base de datos hasta que
la anterior haya sido cerrada. Si se realizan dos consultas en el mismo método
será necesario cerrar la primera antes de hacer la segunda */
        function Cerrar() {
            @mysql_free_result($this->Id);
        }
		
		
// "NumRows" recupera el número de filas que contiene el resultado de la consulta
        function NumRows() {
            return @mysql_num_rows($this->Id);
        }

//"FetchArray" recupera una fila o tupla de la consulta
        function FetchArray() {
            return @mysql_fetch_array($this->Id);
        }
    }
?>
