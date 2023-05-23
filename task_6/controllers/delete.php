<?php
	require 'bd.php';

	$task_id = $_GET['task_id'];
	$task_all = $_GET['task_all'];
	$user_id = $_SESSION['user']['id'];

	if (settype($task_id, 'integer')) {
		$str_delete = "DELETE FROM `tasks` WHERE id = $task_id";
		$run_delete = mysqli_query($connect, $str_delete);
		$_SESSION['mess'] = "<p class='text_mess'>DELETED!</p>";
		header("Location: ../index.php");
	} else {
		$_SESSION['mess'] = "<p class='text_error'>ERROR!</p>";
		header("Location: ../index.php");
	}

	if ($task_all == 'ALL') {
		if (settype($user_id, 'integer')) {
			$str_delete = "DELETE FROM `tasks` WHERE user_id = $user_id";
			$run_delete = mysqli_query($connect, $str_delete);
			$_SESSION['mess'] = "<p class='text_mess'>DELETED!</p>";
			header("Location: ../index.php");
		}
	}
?>