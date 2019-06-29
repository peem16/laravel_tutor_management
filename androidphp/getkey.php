<?php

	require('class/ebook.php');


	$idcd = trim($_REQUEST['idcd']);

	$key = trim($_REQUEST['key']);


	$call = new ebook();
    $call->idcd = $idcd;
  $call->key = $key;

	$call->getkey();

?>
