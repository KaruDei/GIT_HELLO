<?php
	require 'bd.php';

	// ПЕРЕМЕННЫЕ

	$email = $_POST['email'];
	$password = $_POST['password'];
	$auth_sub = $_POST['auth_sub'];
	
	$email = htmlspecialchars($email);
	$password = htmlspecialchars($password);
	$password_hash = password_hash($password, PASSWORD_BCRYPT);

	// $password_verify = password_verify($password, $password_hash);
	
	if (!empty($auth_sub)) {
		if (!empty($email) && !empty($password)){
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$sql_email = mysqli_real_escape_string($connect, $email);
				$str_out_user = "SELECT * FROM `users` WHERE email = '$sql_email'";
				$run_out_user = mysqli_query($connect, $str_out_user);
				$num_user = mysqli_num_rows($run_out_user);
				$out_user = mysqli_fetch_array($run_out_user);
	
	// АВТОРИЗАЦИЯ

				if ($num_user == 1) {
					// if ($out_user['passwrod'] == $password_verify) {
					if (password_verify($password, $out_user['password'])) {
					
						$_SESSION['user'] = array (
							"id" => $out_user['id'],
							"email" => $out_user['email'],
							"password" => $out_user['password'],
							"created_at" => $out_user['created_at'],
						);
						header("Location: ../index.php");

					} else {
						$_SESSION['error'] = "<p class='text_error'>Invalid email or password!</p>";
						header("Location: ../authorization.php");
					}

	// РЕГИСТРАЦИЯ
					
				} elseif ($num_user == 0) {
					
					$str_add_user = "INSERT INTO `users`(`email`, `password`, `created_at`) VALUES ('$sql_email','$password_hash',CURRENT_TIMESTAMP)";
					$run_add_user = mysqli_query($connect, $str_add_user);
					
					if ($run_add_user == true) {

						$str_user = "SELECT * FROM `users` WHERE email = '$sql_email' AND password = '$password_hash'";
						$run_user = mysqli_query($connect, $str_user);
						$user = mysqli_fetch_array($run_user);

						$_SESSION['user'] = array (
							"id" => $user['id'],
							"email" => $user['email'],
							"password" => $user['password'],
							"created_at" => $user['created_at'],
						);
						$_SESSION['mess'] = "<p class='text_mess'>ACCOUNT CREATED!</p>";
						header("Location: ../index.php");

					} else {
						$_SESSION['error'] = "<p class='text_error'>Registration error!</p>";
						header("Location: ../authorization.php");
					}
				} else {
					$_SESSION['error'] = "<p class='text_error'>Authorization error!</p>";
					header("Location: ../authorization.php");
				}
			} else {
				$_SESSION['error'] = "<p class='text_error'>Incorrect email!</p>";
				header("Location: ../authorization.php");
			}
		} else {
			$_SESSION['error'] = "<p class='text_error'>Fill in all fields!</p>";
			header("Location: ../authorization.php");
		}
	}

?>