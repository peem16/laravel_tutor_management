<?php

	require('class/ebook.php');

  $idtutor = trim($_REQUEST['idtutor']);



	$call = new ebook();
  $call->idtutor = $idtutor;



	$call->getreqtutor();

?>
