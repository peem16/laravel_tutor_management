<?php

	require('class/ebook.php');

  $id_tutor_compensate = trim($_REQUEST['id_tutor_compensate']);


	$call = new ebook();

  $call->id_tutor_compensate = $id_tutor_compensate;


	$call->checkstu2();

?>
