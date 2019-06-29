<?php

	require('class/ebook.php');

  $idtutor = trim($_REQUEST['idtutor']);
	$idtable = trim($_REQUEST['idtable']);



	$call = new ebook();
  $call->idtutor = $idtutor;
	$call->idtable = $idtable;



	$call->getCheckbtn();

?>
