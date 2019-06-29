<?php

	require('class/ebook.php');

	$user = trim($_REQUEST['user']);
	$pass = trim($_REQUEST['password']);
  $first = trim($_REQUEST['first']);
  $last = trim($_REQUEST['last']);
  $age = trim($_REQUEST['age']);
  $email = trim($_REQUEST['email']);
  $phone = trim($_REQUEST['phone']);
  $address = trim($_REQUEST['address']);
  $sex = trim($_REQUEST['sex']);



	$call = new ebook();
	$call->username = $user;
	$call->password = $pass;
  $call->firstname = $first;
	$call->lastname = $last;
  $call->age = $age;
	$call->email = $email;
  $call->phone = $phone;
	$call->address = $address;
  $call->sex = $sex;


	$call->register();

?>
