<?php

	require('class/ebook.php');


	$IDUserAccount = trim($_REQUEST['IDUserAccount']);



	$call = new ebook();
  $call->IDUserAccount = $IDUserAccount;




	$call->selectchat();

?>
