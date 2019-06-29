<?php

	require('class/ebook.php');

  $idt = trim($_REQUEST['idtutor']);



	$call = new ebook();
  $call->idt = $idt;



	$call->getleaveStuden();

?>
