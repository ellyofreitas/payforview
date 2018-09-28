<?php 

include 'planoObj.php';

$planos = $planoObj->selectPlanos();

if (count($planos) > 1) {
	print json_encode($planos);
}else{
	echo $planos;
}
 ?>
