<?php
function send_to_email($username, $email){
	$link = get_full_url();
	ini_set("SMTP","aspmx.l.google.com");
	ini_set('memory_limit', '-1');
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers .= "From: staffordtony03@gmail.com" . "\r\n";
	$message = '<!DOCTYPE html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>Document</title>
				</head>
				<body>
					<article>
						<b style="text-transform: uppercase;">Activation Link</b>
						<br><br>
						Click here to activate Your Accaunt: '.$link.'?username='.$username.'
					</article>
				</body>
				</html>';

	mail($email,"Activate Accaunt Link", $message, $headers);
}

function get_full_url(){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
	    $link = "https"; 
	else
	    $link = "http"; 
	  
	// Here append the common URL characters. 
	$link .= "://"; 
	  
	// Append the host(domain name, ip) to the URL. 
	$link .= $_SERVER['HTTP_HOST']; 
	  
	// Append the requested resource location to the URL 
	$link .= $_SERVER['REQUEST_URI']; 

	//replace the end of link
	$link = str_replace('registration', 'activate_user_accaunt_by_link', $link);
	return $link;	
}