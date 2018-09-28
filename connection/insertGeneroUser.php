<?php 

include 'generoObj.php';

$insert = $generoObj->insertGeneroUser($_POST);

if ($insert != true) {
	print $insert;
}else{
	print 'ok';
}
 ?>