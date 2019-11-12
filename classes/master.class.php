<?php
	if (session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}
	require_once('database.class.php');
	include_once('retrieveData.class.php');
	include_once('deleteData.class.php');
	include_once('updateData.class.php');
?>