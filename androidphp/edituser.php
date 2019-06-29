<?php

	require('class/ebook.php');

  $IDUserAccount = trim($_REQUEST['IDUserAccount']);
  $first = trim($_REQUEST['first']);
  $last = trim($_REQUEST['last']);
  $email = trim($_REQUEST['email']);
  $phone = trim($_REQUEST['phone']);
  $address = trim($_REQUEST['address']);


	$call = new ebook();
  $call->IDUserAccount = $IDUserAccount;
	$call->first = $first;
  $call->last = $last;
	$call->email = $email;
  $call->phone = $phone;
	$call->address = $address;




	$call->edituser();

?>
