<?php
class DB_actions{ 
	protected $hostname = "localhost";
	protected $username = "root";
	protected $password = "";
	protected $database = "authentication_system";
	private $conection;

	public function connect_db()
	{
		$this->conection = mysqli_connect($this->hostname, $this->username, $this->password) 
					 or die ("Nu mă pot conecta la baza de date");
		mysqli_select_db($this->conection, $this->database) or die ("Nu găsesc baza de date");		
	}

	public function do_query($query){
		if( mysqli_query($this->conection, $query) )
			return true;
		else 
			return mysqli_error($this->conection);
	}
	public function return_query_as_array($query){
		$sql = mysqli_query($this->conection, $query);
		$sql_array = mysqli_fetch_row($sql);

		return $sql_array;
	}



	public function close_db()
	{
		mysqli_close($this->conection);
	}
}

function show_message_result($text){
	print '<b class="message">'.$text.'</b>';
}

function change_location($location){
	header("Location: ".$location);
}


//===== CLASS TEMPLATES ==========================================================================
//================================================================================================
class templates{
	public function header_guest_template(){
		print '
		<h3>
			<div>Login / Registration System</div>
			<div>
				YOU HAVE NOT YET REGISTERED TO OUR CLUB? 
				<a href="php/login.php">LOGIN</a> 
				OR 
				<a href="php/registration.php">REGISTER</a>			
			</div>
		</h3>
		';
	}

	public function header_user_template(){
		print '
		<h3>
			<div>Login / Registration System</div>
			<div>
				<a href="php/logout.php">Logout</a>
			</div>
		</h3>
		';
	}
}