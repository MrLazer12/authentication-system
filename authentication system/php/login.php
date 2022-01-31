<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/register_and_login.css">
	<title>Login</title>
</head>
<body>
	
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<fieldset>
			<legend>Login</legend>
			<main>
				<div>
					<label for="username">Username: </label>
					<label for="password">Password: </label>
				</div>

				<div>
					<input type="text" name="login" id="username">
					<input type="password" name="password" id="password">
				</div>
			</main>
		</fieldset>
		<input type="submit" value="Login" name="submit">
		<br>
		<br>
		<?php
			if (isset($_POST['submit']) ) {
				$form_username = $_POST['login'];
				$form_password = $_POST['password'];
				$query = "SELECT username, password, is_active FROM user_data
						  WHERE username = '$form_username' AND password = '$form_password'";

				include 'functions.php';
				$db = new DB_actions();
				$db->connect_db();
				$sql = $db->return_query_as_array($query);

				if(empty($sql) ){
					show_message_result("User with this username and password does not exist!");
					return;
				} else {
					if($form_username == $sql[0] && $form_password == $sql[1]){
						$_SESSION['username'] = $sql[0];
						change_location("../index.php?authentication=true&&is_active=".$sql[2]."");
					}
					else
						show_message_result("This user do not exist!");
				}


				$db->close_db();
			}
		?>
	</form>
</body>
</html>