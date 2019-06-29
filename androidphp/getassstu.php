<?php

	require('class/ebook.php');


	$timetable = trim($_REQUEST['timetable']);



	$call = new ebook();

  $call->timetable = $timetable;


	$call->getassstu();

?>
