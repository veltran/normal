<?php 

	$sql = new mysqli('localhost','root','','normal');
	if ($sql->connect_errno):
		echo "Fatal ",$sql->connect_errno;
		//var_dump($sql);
	endif;

?>
