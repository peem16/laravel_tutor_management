<?php

	require('class/ebook.php');

	$user = trim($_REQUEST['user']);
	$pass = trim($_REQUEST['password']);


	$call = new ebook();
	$call->username = $user;
	$call->password = $pass;


	$call->login();

?>
