<?php

	require('class/ebook.php');

  $iduac = trim($_REQUEST['iduac']);



	$call = new ebook();
  $call->iduac = $iduac;





	$call->testing();

?>
