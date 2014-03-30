<?php
/*
* Autor: Xoco, Richard
* Colaboradores:
* Muestra un menu de opciones en la parte superior de la pagina dependiendo del usuario logeado
*/
	session_start();
	if(isset($_SESSION['priv'])){
		//Usuario administrador
		if($_SESSION['priv']==1){
			$option='
				<div class="barra">
					<ul id="tope">
						<li><a href=addUserView.php>Add User</a></li>
						<li><a href=edicionUsuarios.php>Edit User</a></li>
						<li><a href="contenido.php">Lista de Contenido</a></li>
						<li><a href=logout.php>Log out</a></li>
					</ul>
				</div>
				</br></br></br>
			'; 
		}
		else{
		//Usuario mortal
			$option='
				<div class="barra">
					<ul id="tope">
						<li><a href="contenido.php">Lista de Contenido</a></li>
						<li><a href=logout.php>Log out</a></li>
					</ul>
				</div>
				</br></br></br>
			';
		}
	}
	else{
		//Usuario sin cuenta
		$option='
			<div class="barra">
            <ul id="tope">
                <li><a href="loginView.php">Acceder</a></li>
                <li><a href="contenido.php">Lista de Contenido</a></li>
            </ul>
        </div>
        </br></br></br>
		';
	}
?>
<table width="100%" cellpadding="0" cellspacing="0">
<tr bgcolor="#eeeeee">
	<td><h1>Front-End</h1></td>
</tr>
<tr>
	<td><?php echo $option?></td>
</tr>
</table>
<br /><br />
