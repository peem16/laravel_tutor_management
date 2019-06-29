<?php
	include('class\ebook.php');

	$target_dir = 'upload/slip';


	$idUserAccount = trim($_REQUEST['idUserAccount']);
	$image = trim($_REQUEST['image']);
  	$idpay = trim($_REQUEST['idpay']);
	//$nameimage = trim($_REQUEST['nameimage']);


	$call = new ebook();
	$call->target_dir = $target_dir;
	$call->idUserAccount = $idUserAccount;
	$call->image = $image;
	$call->idpay = $idpay;


	$call->slip_reser();

	?>
