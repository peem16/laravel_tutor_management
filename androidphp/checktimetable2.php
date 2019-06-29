<?php

	require('class/ebook.php');


	$idcd = trim($_REQUEST['idcd']);

	$date1 = trim($_REQUEST['date1']);
	$date2 = trim($_REQUEST['date2']);
	$time1 = trim($_REQUEST['time1']);
	$time2 = trim($_REQUEST['time2']);
	$ids = trim($_REQUEST['ids']);



	$call = new ebook();
    $call->idcd= $idcd;
  $call->date1 = $date1;
  $call->time1 = $time1;
  $call->date2 = $date2;
  $call->time2 = $time2;
	$call->ids = $ids;

	$call->checktimetable2();

?>
