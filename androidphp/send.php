<?php

	require('class/ebook.php');

  $idreq = trim($_REQUEST['idreq']);
	$idstu = trim($_REQUEST['idstu']);
	$send = trim($_REQUEST['send']);



	$call = new ebook();
  $call->idreq = $idreq;
	$call->idstu = $idstu;
	$call->send = $send;



	$call->send();

?>
