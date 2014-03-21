<?php
	if(isset($_SESSION)){
		if($_SESSION['priv']==1){
			$option='
				<a href=view/addUser.php>Add User</a>|
				<a href=view/setView.php>Edit View</a>|
				<a href=logout.php>Log out</a>
			'; 
		}
		else{
			$option='
				<a href=view/setView.php>Edit View</a>|
				<a href=logout.php>Log out</a>
			';
		}
	}
	else{
		$option='
			<a href=loginView.php>Log In</a>
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
