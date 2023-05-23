<?php
	session_start();

	if (!$_SESSION['user']) {
		header("Location: authorization.php");
	}

	include 'components/header.php';
	include 'components/contents/main.php';
	include 'components/footer.php';
?>