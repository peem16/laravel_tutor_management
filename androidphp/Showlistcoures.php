<?php

	require('class/ebook.php');

	$idstudent = trim($_REQUEST['idstudent']);





	$call = new ebook();
	$call->idstudent = $idstudent;



	$call->showlistcoures();

?>
