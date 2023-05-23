<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Authorization</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<div class="container_auth">
		<p class="container_title">AUTHORIZATION</p>
		<form action="controllers/auth.php" method="POST" class="auth_form">
			<div class="form_item">
				<p class="form_text">Email</p>
				<input type="text" name="email" placeholder="email@mail.ru">
			</div>
			<div class="form_item">
				<p class="form_text">Password</p>
				<input type="password" name="password">
			</div>
			<div class="form_item">
				<input type="submit" name="auth_sub" class="auth_sub" value="LOGIN">
			</div>
			<p class="form_reg_text">If you don't have an account, it will be created</p>
		</form>

		<?php
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		?>
	</div>

</body>
</html>