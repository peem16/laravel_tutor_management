<?php

	require('class/ebook.php');

  $idovertime = trim($_REQUEST['idovertime']);


	$call = new ebook();

  $call->idovertime = $idovertime;


	$call->checkstu3();

?>
