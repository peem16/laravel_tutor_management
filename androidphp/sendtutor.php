<?php

	require('class/ebook.php');

  $idreq = trim($_REQUEST['idreq']);
	$idtutor = trim($_REQUEST['idtutor']);
	$send = trim($_REQUEST['send']);



	$call = new ebook();
  $call->idreq = $idreq;
	$call->idtutor = $idtutor;
	$call->send = $send;



	$call->sendtutor();

?>
