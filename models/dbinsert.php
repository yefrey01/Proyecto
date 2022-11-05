<?php
	
	$conectar = mysqli_connect('localhost','root','AdminP3n4g0sL0cal!','bd_innove');
	if(!$conectar){
		
		printf("Error al conectarse con la base de datos.");
		exit();	
	}
	
?>
