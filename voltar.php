<?php 
if (isset($_COOKIE['s'])) {
	setcookie('filme', '');
	setcookie('s', '');
	header("location: ".$_COOKIE['back'].".php?s=".$_COOKIE['s']);
}else{	
	setcookie('filme', '');
	header("location: ".$_COOKIE['back'].".php");
}
?>
