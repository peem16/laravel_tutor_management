<?php

	require('class/ebook.php');


		$timetable = trim($_REQUEST['idtable']);
		$tutor = trim($_REQUEST['idtutor']);

	$call = new ebook();
	$call->timetable = $timetable;
	$call->tutor = $tutor;

	$call->leavefind();

?>
