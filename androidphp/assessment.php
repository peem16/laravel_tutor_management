<?php

	require('class/ebook.php');

  $idstudent = trim($_REQUEST['idstudent']);
  $id_timetable = trim($_REQUEST['id_timetable']);
  $ask1 = trim($_REQUEST['ask1']);
  $ask2 = trim($_REQUEST['ask2']);
  $ask3 = trim($_REQUEST['ask3']);
  $ask4 = trim($_REQUEST['ask4']);
  $ask5 = trim($_REQUEST['ask5']);
	$context = trim($_REQUEST['context']);
	$context2 = trim($_REQUEST['context2']);


	$call = new ebook();
  $call->idstudent = $idstudent;
	$call->id_timetable = $id_timetable;
  $call->ask1 = $ask1;
	$call->ask2 = $ask2;
  $call->ask3 = $ask3;
	$call->ask4 = $ask4;
	$call->ask5 = $ask5;
	$call->context = $context;
	$call->context2 = $context2;



	$call->assessment();

?>
