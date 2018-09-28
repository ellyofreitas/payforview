<?php 

include './connection/userObj.php';

$session = $userObj->sessionUser();
if ($session == false) {
	header("location: login.php");
}
?>
