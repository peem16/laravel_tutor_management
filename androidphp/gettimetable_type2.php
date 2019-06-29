<?php

	require('class/ebook.php');


	$idc = trim($_REQUEST['idc']);



	$call = new ebook();

  $call->icd = $idc;


	$call->gettimetable_type2();

?>
