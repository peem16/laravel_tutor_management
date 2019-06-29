<?php

	require('class/ebook.php');

  $id_timetable = trim($_REQUEST['id_timetable']);
	$idtutor = trim($_REQUEST['idtutor']);



	$call = new ebook();
  $call->id_timetable = $id_timetable;
	$call->idtutor = $idtutor;



	$call->cmon();

?>
