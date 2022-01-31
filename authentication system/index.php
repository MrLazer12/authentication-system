<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and User Authentication System</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/register_and_login.css">
</head>
<body>
	<?php
		include 'php/functions.php';
		$header_template = new templates();

		if (array_key_exists('authentication', $_GET) && array_key_exists('is_active', $_GET)) {
			$authentication = $_GET['authentication'];
			$is_active = $_GET['is_active'];

			if ($authentication == true){
				if($is_active == 1){	
					$header_template->header_user_template();
					
					$db = new DB_actions();
					$db->connect_db();				
						$query = "SELECT * FROM user_data WHERE username = '".$_SESSION['username']."'";
						$user_data = $db->return_query_as_array($query);
						show_user_data($user_data);
					$db->close_db();
				} else
					print show_message_result("Your account is not activated. <br>Check your email to activate.");
			}
		}
		else
			$header_template->header_guest_template();



		function show_user_data($user_data){
			print '
				<br><br>
				<form>
					<fieldset>
						<legend>User Details:</legend>
						<main>
							<div>
								<label for="username">Username</label>
								<label for="password">Password</label>
								<label for="fname">First name</label>
								<label for="lname">Last name</label>
								<label for="sex">Gender:</label>
								<label for="email">Email</label>
								<label for="birthday">Birthday</label>
							</div>
							<div>
								<input readonly type="text" id="username" name="username" value="'.$user_data[0].'">
								<input readonly type="text" id="password" name="password" value="'.$user_data[1].'">
								<input readonly type="text" id="fname" name="fname" value="'.$user_data[2].'">
								<input readonly type="text" id="lname" name="lname" value="'.$user_data[3].'">
								<input readonly type="text" id="sex" name="email" value="'.$user_data[4].'">
								<input readonly type="email" id="email" name="email" value="'.$user_data[5].'">
								<input readonly type="date" id="birthday" name="birthday" value="'.$user_data[6].'">	
							</div>				
						</main>
					</fieldset>		
				</form>
			';
		}
	?>

</body>
</html>