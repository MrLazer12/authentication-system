<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Email Verification</title>
	<style>
		article {
			text-align: center;
			width: 60%;
			margin: 0 auto;
			background: lightgray;
			padding: 1.5vh;
		}
		article > h1{
			font-size: 35px;
		}
		article > p:first-of-type{
			width: 70%;
			margin: 0 auto;
			font-size: 20px;
			color: darkgreen;
			border-radius: 0.2vw;
			text-align: center;
			padding: 1.5vh 1vw;
		}
		.background_lightgreen{
			background-color: lightgreen;			
		}
		.background_brown{
			background-color: brown;			
		}

		article > a{
			padding: 0.5vh 1vw;
			font-size: 23px;
			background-color: darkgreen;
			text-decoration: none;
			border-radius: 0.2vw;
			color: white;
		}
		article > a:hover{
			cursor: pointer;
			transition: 1s ease;
			background-color: brown;
		}
	</style>
</head>
<body>
	<?php
		include 'functions.php';
		$username = $_GET['username'];
		$query = "SELECT is_active FROM user_data WHERE username = '$username'";

		$db = new DB_actions;
		$db->connect_db();
		$sql = $db->return_query_as_array($query);
			if($sql[0] == 0){
				$query = "UPDATE user_data 
						  SET is_active = 1
						  WHERE username = '$username'";				
				if( $db->do_query($query) == true){
					$_SESSION['username'] = $username;
					show_article("../index.php?authentication=true&&is_active=1", "User email successfully verified!" ,"background_lightgreen");
				}
				else
					print "Error: ".$db->do_query($query);				
			} else
				print show_article("../index.php?authentication=true&&is_active=1", "User email already verified!", "background_brown");


		$db->close_db();


		function show_article($url, $message, $className){
			print '
				<article>
					<h1>User Email Verification Demo</h1>
					<p class="'.$className.'">'.$message.'</p>
					<p>if your user accaunt is verified then click on the following button to login</p>
					<br>
					<a href="'.$url.'">Click to Login</a>
				</article>
			';
		}
	?>
</body>
</html>