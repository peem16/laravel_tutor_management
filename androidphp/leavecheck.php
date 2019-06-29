<?php

	require('class/ebook.php');

	$Idtimetable_deteil = trim($_REQUEST['Idtimetable_deteil']);


	$call = new ebook();
	$call->Idtimetable_deteil = $Idtimetable_deteil;


	$call->leavecheck();

?>
