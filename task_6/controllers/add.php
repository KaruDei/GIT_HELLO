<?php
	require 'bd.php';

	$add_text = $_POST['add_text'];
	$add_sub = $_POST['add_sub'];
	$user_id = $_SESSION['user']['id'];
	
	$int_user_id = settype($user_id, 'integer');
	if ($int_user_id) {
		if (!empty($add_sub)) {
			if (!empty($add_text)) {
				$add_text = htmlspecialchars($add_text);
				$sql_text = mysqli_real_escape_string($connect, $add_text);
				
				$str_add_task = "INSERT INTO `tasks`(`user_id`, `description`, `status`, `created_at`) VALUES ('$user_id','$sql_text','1',CURRENT_TIMESTAMP)";
				$run_add_task = mysqli_query($connect, $str_add_task);
				
				if ($run_add_task) {
					$_SESSION['mess'] = "<p class='text_mess'>Added!</p>";
					header("Location: ../index.php");
				}
				
			} else {
				$_SESSION['error'] = "<p class='text_error'>Fill in all fields!</p>";
				header("Location: ../index.php");
			}
		}
	}
?>