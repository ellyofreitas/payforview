<?php 

include 'userObj.php';

$cadastro = $userObj->createUser($_POST);

if ($cadastro > 0) {
	$json['stts'] = 1;
	$json['num'] = $cadastro;
}elseif ($cadastro == 'email') {
	$json['stts'] = 2;
	$json['msg'] = 'Este e-mail já está sendo utilizado!';
}else{
	$json['stts'] = 0;
	$json['msg'] = $cadastro;
}
	print json_encode($json);
 ?>
