<?php
	function message($tipo,$mensaje,$page){
		header('Location: /front/controllers/'.$tipo.'.php?mensaje='.$mensaje.'&referer='.$page);
	}
?>
