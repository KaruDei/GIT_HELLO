<?php
	require 'bd.php';

	$task_id = $_GET['task_id'];
	$task_all = $_GET['task_all'];
	$user_id = $_SESSION['user']['id'];

	$int_task_id = settype($task_id, 'integer');
	if ($task_id) {
		if ($int_task_id) {
			$str_out_task = "SELECT * FROM `tasks` WHERE id = $task_id";
			$run_out_task = mysqli_query($connect, $str_out_task);
			$out_task = mysqli_fetch_array($run_out_task);

			if ($out_task['status'] == 1) {
				$str_status = "UPDATE `tasks` SET `status`= 2 WHERE id = $task_id";
			} elseif ($out_task['status'] == 2) {
				$str_status = "UPDATE `tasks` SET `status`= 1 WHERE id = $task_id";
			} else {
				$_SESSION['mess'] = "<p class='text_error'>ERROR!</p>";
				header("Location: ../index.php");
			}

			$run_status = mysqli_query($connect, $str_status);
			header("Location: ../index.php");
		}
	}
	if ($task_all == 'ALL') {
		if (settype($user_id, 'integer')) {
			
			$str_status = "UPDATE `tasks` SET `status`= 2 WHERE user_id = $user_id";
			$run_status = mysqli_query($connect, $str_status);
			header("Location: ../index.php");
		}
	}

?>