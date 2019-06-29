<?php

	require('class/ebook.php');

	$timetable = trim($_REQUEST['timetable']);
	$tutor = trim($_REQUEST['tutor']);
	$content = trim($_REQUEST['content']);

	$date = trim($_REQUEST['date']);

	$call = new ebook();
	$call->timetable = $timetable;
	$call->tutor = $tutor;
	$call->content = $content;
	$call->date = $date;

	$call->leavetutor();

?>
