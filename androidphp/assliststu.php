<?php

	require('class/ebook.php');

  $id_timetable = trim($_REQUEST['id_timetable']);



	$call = new ebook();
  $call->id_timetable = $id_timetable;



	$call->assliststu();

?>
