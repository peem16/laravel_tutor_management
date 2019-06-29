<?php

	require('class/ebook.php');

	$idstudent = trim($_REQUEST['idstudent']);
  $id_timetable = trim($_REQUEST['id_timetable']);



	$call = new ebook();
	$call->idstudent = $idstudent;
	$call->id_timetable = $id_timetable;


	$call->finalcoures();

?>
