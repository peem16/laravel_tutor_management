<?php

	require('class/ebook.php');

  $timetable = trim($_REQUEST['id_timetable']);


	$call = new ebook();

  $call->timetable = $timetable;


	$call->getCheckstuall();

?>
