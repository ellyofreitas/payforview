<?php 

include 'generoObj.php';

$generos = $generoObj->selectGeneros();

if (count($generos) > 1) {
	print json_encode($generos);
}else{
	echo $generos;
}

 ?>