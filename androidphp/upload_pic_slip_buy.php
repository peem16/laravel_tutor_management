<?php
	include('class\ebook.php');

	$target_dir = 'upload/slip';


	$idUserAccount = trim($_REQUEST['idUserAccount']);
	$image = trim($_REQUEST['image']);
  	$idbuy = trim($_REQUEST['idbuy']);
	//$nameimage = trim($_REQUEST['nameimage']);


	$call = new ebook();
	$call->target_dir = $target_dir;
	$call->idUserAccount = $idUserAccount;
	$call->image = $image;
	$call->idbuy = $idbuy;


	$call->slip_buy();

	?>
