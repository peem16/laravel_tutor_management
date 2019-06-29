<?php

	require('class/ebook.php');

  $idt = trim($_REQUEST['idt']);



	$call = new ebook();
  $call->idt = $idt;



	$call->asslisttutor();

?>
