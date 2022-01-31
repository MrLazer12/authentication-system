<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<link rel="stylesheet" href="../css/register_and_login.css">
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
	<form action="registration.php" method="post">
		<h4>Please complete the form below:</h4>
		<fieldset>
			<legend>Login Details:</legend>
			<main>
				<div>
					<label for="user_name">Username</label>
					<label for="password">Password</label>
					<label for="retype_password">Retype Password</label>
				</div>
				<div>
					<input required type="text" id="user_name" name="user_name">
					<input required type="password" id="password" name="password">
					<input required type="password" id="retype_password" name="retype_password">		
				</div>				
			</main>
		</fieldset>



		<fieldset>
			<legend>User Details:</legend>
			<main>
				<div>
					<label for="fname">First name</label>
					<label for="lname">Last name</label>
					<label>Gender:</label>
					<label for="email">Email</label>
					<label for="birthday">Birthday</label>
				</div>
				<div>
					<input required type="text" id="fname" name="fname">
					<input required type="text" id="lname" name="lname">

						<div>
							<span>
								<input id="male" type="radio" name="sex" value="male">
								<label for="male">Male</label>
							</span>
							<span>
								<input id="female" type="radio" name="sex" value="female">
								<label for="female">Female</label>
							</span>
						</div>

					<input required type="email" id="email" name="email">
					<input required type="date" id="birthday" name="birthday">				
				</div>				
			</main>
		</fieldset>

		<input type="submit" value="Register" name="submit">
		<br>
		<br>
		<?php
		include 'functions.php';
			if(isset($_POST['submit']) ){
				$fname     = $_POST['fname'];
				$lname     = $_POST['lname'];
				$email     = $_POST['email'];
				$birthday  = $_POST['birthday'];				

				if(isset($_POST['sex']) == 1)
					$sex = $_POST['sex'];
				else {
					print '<b class="message">Please select your gender!</b>';
					return;					
				}

				$user_name = $_POST['user_name'];
				$password = $_POST['password'];
				$retype_password = $_POST['retype_password'];

				if($password == $retype_password) {
					$db = new DB_actions();
					$db->connect_db();

					$query = "SELECT username FROM user_data WHERE username = '$user_name'";
					$data = $db->return_query_as_array($query);

					if( empty($data) ){
						$template = "/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/";

						if( preg_match($template, $password) ) {
							$query = "INSERT INTO user_data(username, password, first_name, last_name, sex, email, birthday, id)
									  VALUES('$user_name', '$password', '$fname', '$lname', '$sex', '$email', '$birthday', '')";

							($db->do_query($query) == true) ? print show_message_result("Data insert complete!") :
															  print show_message_result( $db->do_query($query) );

							include 'send_activation_link.php';
							send_to_email($user_name, $email);
						} else
							show_message_result("Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.");						
					} else {
						if($data[0] == $user_name){
							show_message_result("This username already exist in database!");
							return;
						} 
					}

				} else
					$db->show_message_result('Passwords don\'t match!');

				$db->close_db();
			}
		?>
	</form>

	
</body>
</html>