<?php

	require('class/ebook.php');

  $idtable = trim($_REQUEST['idtable']);
	$idtutor = trim($_REQUEST['idtutor']);



	$call = new ebook();
  $call->idtable = $idtable;
	$call->idtutor = $idtutor;



	$call->le();

?>
