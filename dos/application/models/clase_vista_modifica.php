<?php
class vista_modifica{

	function consulta_username(){
		include ("conectmysql.php");
		include ("querymysql.php");

		$database = new conectmysql();
		$Consulta = new querymysql( $database, "SELECT users.name FROM users");
		$NumFilas = $Consulta->NumRows(); //Numero de filas que contienen el resultado de la consulta
		$reg = $Consulta->FetchArray(); //Fila o tupla de la consulta   
		
		//mostrar resultados
		echo "<TABLE BORDER=1 WIDTH=470>";

		echo "<TD WIDTH=100>";
		echo "Username:";
		echo "</TD>";

		echo "</TABLE>";
	
		for ($i=0;$i<$NumFilas;$i++)
			{
			$x=$i+1;
			echo "<TABLE BORDER=1 WIDTH=470>";
	
			echo "<TD WIDTH=100>";
			echo " ".$reg["nombre"];
			echo "</TD>";			
		
			echo "<TD WIDTH=100>";
			echo "<input type=\"submit\" name=\"modifica\" value=\"Modificar\">";
	
			echo "<TD WIDTH=100>";
			echo "<input type=\"submit\" name=\"elimina\" value=\"Eliminar\">";
			
			echo "</TD>";
			echo "</TABLE>";
			}
	$Consulta->Cerrar();
   	return $reg["name"];
	}
/*
	function modificar(){
	
		include ("conectmysql.php");
		include ("querymysql.php");

		$items=$_POST["modifica"];
		$database = new conectmysql();
		$Consulta = new querymysql( $database, "SELECT users.name FROM users WHERE name=".$_POST["modifica"]." ");

}
*/

?>