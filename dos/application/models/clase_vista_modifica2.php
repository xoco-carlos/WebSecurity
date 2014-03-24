<?php
class vista_modifica{

	function consulta_username(){
		include ("conectmysql.php");
		include ("querymysql.php");

		$database = new conectmysql();
		$Consulta = new querymysql( $database, "SELECT users.name FROM users");
		$NumFilas = $Consulta->NumRows(); //Numero de filas que contienen el resultado de la consulta
		$reg = $Consulta->FetchArray(); //Fila o tupla de la consulta   
		echo "<br>";
		
		//mostrar resultados
		if ($reg){
			echo "<TABLE BORDER= '1' WIDTH=400>";
			echo "<tr><td>Username</td></tr>";
			echo "</TABLE>";
			echo "<form action=\"modUser.php\" method=\"post\">"; 
			do	{
				echo "<TABLE BORDER= '1' WIDTH=400>";
				echo "<tr><TD WIDTH=200>".$reg["name"]."</TD><td><input type=\"submit\" name=\"BotonModif\" value=\"Modificar\"></td><td><input type=\"submit\" name=\"BotonElimin\" value=\"Eliminar\"></td></tr>";
				}
			while ($reg);
			echo "</TABLE>";
			echo "</form>";
			}
		else{
			echo "¡No se ha encontrado ningún registro!";
			}
		
		$Consulta->Cerrar();
   	return $reg["name"];
	}	

	
	function ModificaUsername(){
		include ("conectmysql.php");
		include ("querymysql.php");

		$database = new conectmysql(); 
		$Consulta = new querymysql( $database, "SELECT users.name FROM users WHERE name=".$_POST["BotonModif"]." ");
		$reg = $Consulta->FetchArray(); //Fila o tupla de la consulta   
		echo "<br>";
		
		//mostrar resultados
		if ($reg){
			echo "<TABLE BORDER= '1' WIDTH=300>";
			echo "<tr><td>Username</td></tr>";
			echo "</TABLE>";
			
			echo "<TABLE BORDER= '1' WIDTH=300>";
			echo "<tr><TD>".$reg["name"]."</TD></tr>";
			echo "</TABLE>";
				
				//Cuadro para introducir modificación
				echo "<form action=\"modUser.php?id=".$_POST["BotonModif"]."\" method=\"post\">"; 
				echo "<TABLE BORDER= '1' WIDTH=300>";
				echo "<tr><TD><input type=\"text\" name=\"nomb\" size=\"30\"></TD>";
				echo "</TABLE>";
				echo "<br>";
				
				echo "<input type=\"submit\" name=\"actualiza\" value=\"Actualizar\">";
				echo "</form>";
			}
		else{
			echo "¡No se ha encontrado ningún registro!";
			}
		
		$Consulta->Cerrar();

	}
	
	function ActualizaModifUsername($username){
		include ("conectmysql.php");
		include ("querymysql.php");

		$database = new conectmysql(); 
		$Consulta = new querymysql( $database, "UPDATE users SET name = '".$_POST["nomb"]."' WHERE name = ".$username." ");
		echo "<br>";
		echo "Actualización finalizada.";		
		echo "<br>";
		echo "<a href='modUser.php'><input type=\"button\" value=\"Regresar\"></a>"; //Regresa a la lista de todos los Username
		
		$Consulta->Cerrar();

	}
	function EliminaUsername(){
		include ("conectmysql.php");
		include ("querymysql.php");

		$database = new conectmysql(); 
		$Consulta = new querymysql( $database, "DELETE FROM users WHERE name=".$_POST["BotonElimin"]." ");
		$reg = $Consulta->FetchArray(); //Fila o tupla de la consulta   
		echo "<br>";
		echo "Username eliminado.";		
		echo "<br>";
		echo "<a href='modUser.php'><input type=\"button\" value=\"Regresar\"></a>"; //Regresa a la lista de todos los Username

		$Consulta->Cerrar();
	
	}

}

?>