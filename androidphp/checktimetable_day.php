<?php

	require('class/ebook.php');




	$date = trim($_REQUEST['date']);
	$time1 = trim($_REQUEST['time1']);
	$time2 = trim($_REQUEST['time2']);
	$idtutor = trim($_REQUEST['idtutor']);

	$idtable = trim($_REQUEST['idtable']);



	$call = new ebook();

  $call->date = $date;
  $call->time1 = $time1;
  $call->time2 = $time2;
  $call->idtutor = $idtutor;

	$call->idtable = $idtable;

	$call->checktimetable_day();

?>
