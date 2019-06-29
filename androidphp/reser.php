<?php

	require('class/ebook.php');


	$idcourse = trim($_REQUEST['idcourse']);
	$idUserAccount = trim($_REQUEST['idUserAccount']);
	$reserve_price = trim($_REQUEST['reserve_price']);


	$call = new ebook();
  $call->idcourse = $idcourse;
  $call->idUserAccount = $idUserAccount;
  $call->reserve_price = $reserve_price;


	$call->reser();

?>
