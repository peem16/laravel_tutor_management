<?php

	require('class/ebook.php');


	$idc = trim($_REQUEST['idc']);



	$call = new ebook();
  $call->idc = $idc;




	$call->getcd();

?>
