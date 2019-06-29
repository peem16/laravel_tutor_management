<?php

	require('class/ebook.php');

	$timetable = trim($_REQUEST['timetable']);
	$tutor = trim($_REQUEST['tutor']);
	$content = trim($_REQUEST['content']);


	$call = new ebook();
	$call->timetable = $timetable;
	$call->tutor = $tutor;
	$call->content = $content;

	$call->leavetutor_fix();

?>
