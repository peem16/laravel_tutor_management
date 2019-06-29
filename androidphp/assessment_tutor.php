<?php

	require('class/ebook.php');

  $idtutor= trim($_REQUEST['idtutor']);
  $Idtimetable_deteil = trim($_REQUEST['Idtimetable_deteil']);
  $ask1 = trim($_REQUEST['ask1']);
  $ask2 = trim($_REQUEST['ask2']);
  $ask3 = trim($_REQUEST['ask3']);
  $ask4 = trim($_REQUEST['ask4']);
  $ask5 = trim($_REQUEST['ask5']);
  $context = trim($_REQUEST['context']);
	// $number = trim($_REQUEST['number']);
	$Total = trim($_REQUEST['Total']);



	$call = new ebook();
  $call->idtutor = $idtutor;
	$call->Idtimetable_deteil = $Idtimetable_deteil;
  $call->ask1 = $ask1;
	$call->ask2 = $ask2;
  $call->ask3 = $ask3;
	$call->ask4 = $ask4;
	$call->ask5 = $ask5;
	$call->context = $context;
	// $call->number = $number;
$call->Total = $Total;

	$call->assessment_tutor();

?>
