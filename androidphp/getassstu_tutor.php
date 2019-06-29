<?php

	require('class/ebook.php');


  $idtimetable = trim($_REQUEST['idtimetable']);




	$call = new ebook();
  $call->idtimetable = $idtimetable;


	$call->getassstu_tutor();

?>
