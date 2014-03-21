<?php
	function message($tipo,$mensaje){
		header('Location:'.$tipo.'.php?mensaje='.$mensaje.'&referer='.$_SERVER["HTTP_REFERER"]);
	}
?>
