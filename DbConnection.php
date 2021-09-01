<?php
class DbConnection {
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "oop_login";

	protected $connection;

	public function __construct() {
		if (! $this->connection) {
			$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
			if ($this->connection->error) {
				die("The Connection Is Failed");
			}
			
			return $this->connection;
		}
		
		return $this->connection;

	}
	
} // End Of Class


 ?>