<?php

	require('class/ebook.php');

	$idt = trim($_REQUEST['idt']);
	$date = trim($_REQUEST['date']);
	$time1 = trim($_REQUEST['time1']);

	$time2 = trim($_REQUEST['time2']);
	$room = trim($_REQUEST['room']);

	$call = new ebook();
	$call->room = $room;
	$call->time2 = $time2;
	$call->time1 = $time1;
	$call->date = $date;
	$call->idt = $idt;

	$call->leavetutordate();

?>
