<?php
//Consulta: Obtiene el id de usuario, tipo, y el articulo de cada casilla.
$database = new conectmysql();
	$Consulta = new querymysql( $database, "SELECT users.id,tip_user, vistas.casilla1, casilla2, casilla3, casilla4, casilla5, casilla6, casilla7, casilla8, casilla9 FROM users, vistas WHERE users.id='".$id_user."' AND vistas.id='".$id_user."'	");
		$reg = $Consulta->FetchArray();    
    $Consulta->Cerrar();
?>
