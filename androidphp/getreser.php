<?php

	require('class/ebook.php');


	$idUserAccount = trim($_REQUEST['idUserAccount']);



	$call = new ebook();

  $call->idUserAccount = $idUserAccount;


	$call->getreser();

?>
