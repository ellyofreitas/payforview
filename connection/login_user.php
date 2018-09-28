<?php 

include_once 'userObj.php';

$login = $userObj->loginUser($_POST);

if ($login!=null) 
{
	$retorno["val"] = 1;
	$retorno["url"] = "homepage.php";
}else if($login == false)
{
	$retorno["val"] = 0;
}else{
	$retorno["val"] = $login;
}
print json_encode($retorno);
 ?>