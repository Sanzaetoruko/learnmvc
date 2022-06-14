<?php 

class Database {

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		// Connect to database
		// Data source name
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch(PDOException $e) {
			die($e->getMessage());
		}

	}

	public function query($query)
	{
		// Preparing query before execute
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{

		// Checking is there a parameter to order data

		// Checking the type of the parameter

		if (is_null($type)) {
			
			switch (true) {
				case is_integer($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}

		}

		// Writing ordered parameter

		$this->stmt->bindValue($param, $value, $type);

	}


	public function execute()
	{

		// Executing statement
		$this->stmt->execute();

	}

	public function resultSet()
	{

		// Taking multi result
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function single()
	{

		// Taking single result
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);

	}

	public function rowCount()
	{
		return $this->stmt->rowCount();
	}

}