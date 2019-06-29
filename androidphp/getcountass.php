<?php

	require('class/ebook.php');

  $ids = trim($_REQUEST['ids']);



	$call = new ebook();
  $call->ids = $ids;



	$call->getcountass();

?>
