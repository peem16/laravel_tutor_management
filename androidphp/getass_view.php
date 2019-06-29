<?php

	require('class/ebook.php');


	$idevaluation = trim($_REQUEST['idevaluation']);



	$call = new ebook();

	$call->idevaluation = $idevaluation;



	$call->getass_view();

?>
