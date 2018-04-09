<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../config/config.php');
class Database{
	
	public $host; 
	public $user; 
	public $pass; 
	public $dbName; 
	
	
	
	public $link;
	public $error;
	
	public function __construct()
	{
		$this->host = DB_HOST;
		$this->user = DB_USER;
		$this->pass = DB_PASS;
		$this->dbName = DB_NAME;
		$this->connectDB();
	}
	private function connectDB()
	{
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbName);
		if(!$this->link)
		{
			$this->$error = "Connection Failed".$this->$link->connect_error();
			return false;
		}
	}
	
	public function insert($query)
	{
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result)
		{
			return $result;
		}
		else{
			return false;
		}
	}
	
	
	public function select($query)
	{
		//echo $query;exit;
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows>0)
		{
			//echo "Hello";
			return $result;
		}
		else{
			//echo "False";
			return false;
		}
	}
	public function update($query)
	{
		//echo $query;exit;
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result)
		{
			return $result;
		}
		else{
			return false;
		}
	}
	public function delete($query)
	{
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result)
		{
			return $result;
		}
		else{
			return false;
		}
	}
	
}
?>