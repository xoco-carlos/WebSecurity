<?php
//Consulta: Obtiene el id de usuario, tipo, y el articulo de cada casilla.

class consultas{

	include conectmysql;
	include querymysql;
	
	function consulta_id($id_user){
		$database = new conectmysql();
		$Consulta = new querymysql( $database, "SELECT vistas.nodo FROM users_has_vistas, vistas WHERE users_has_vistas.users_id='".$id_user."' AND vistas.idvistas= user_has_vistas.vistas_idvistas");
		$reg = $Consulta->FetchArray();    
		$Consulta->Cerrar();
		return $reg;
	}
	// inserta los nodos nuevos que se generen al crear un nuevo articulo o publicación
	function insert_vista($nodo){
		$database = new conectmysql();
		$Consulta = new querymysql( $database, "INSERT INTO vistas (nodo) VALUES ({$nodo})");
		$Consulta->Cerrar();
	}
	
	//asocia un nodo a un usuario
	function insert_vista_usuario($id_user,$nodo){
		$database = new conectmysql();
		$idVista = new querymysql( $database, "SELECT idvistas FROM vistas WHERE nodo=".$nodo."");
		$idVista->Cerrar();
		$Consulta = new querymysql( $database, "INSERT INTO users_has_vistas VALUES ({$id_user},{$idVista})");
		$Consulta->Cerrar();
	}
	
	//Actualiza
	function update_vista($id_user,$nodo){
	$database = new conectmysql();
	$idVista = new querymysql( $database, "SELECT idvistas FROM vistas WHERE nodo=".$nodo."");
	$idVista->Cerrar();
	$Consulta = new querymysql( $database, "UPDATE users_has_vistas SET vistas_idvistas={$idVista} WHERE users_id='".$id_user."' ");
    $Consulta->Cerrar();
	}
}
?>