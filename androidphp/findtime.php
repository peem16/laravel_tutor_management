<?php

	require('class/ebook.php');

	$idtable = trim($_REQUEST['idtable']);


	$call = new ebook();
	$call->idtable = $idtable;



	$call->findtime();

?>
