<?php

	require('class/ebook.php');


	$idtd = trim($_REQUEST['idtd']);



	$call = new ebook();
  $call->idtd = $idtd;




	$call->getCheckstuone();

?>
