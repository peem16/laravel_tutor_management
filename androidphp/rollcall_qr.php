<?php

	require('class/ebook.php');

	$IDUserAccount = trim($_REQUEST['IDUserAccount']);
	$idtimetable = trim($_REQUEST['tiemtable']);




	$call = new ebook();
	$call->IDUserAccount = $IDUserAccount;
	$call->idtimetable = $idtimetable;


	$call->rollcall_qr();

?>
