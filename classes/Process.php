<?php 
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Session.php');
//Session::init();
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

class Process
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();	
		$this->fm = new Format();
	}
	
	public  function processData($data)
	{
		$times = $this->fm->validation($data['times']);
		$selectedAns = $this->fm->validation($data['ans']);
		$number = $this->fm->validation($data['number']);
		$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
		$number = mysqli_real_escape_string($this->db->link, $number);
		$times = mysqli_real_escape_string($this->db->link, $times);
		$next = $times+1;
		if(!isset($_SESSION['score']))
		{
			$_SESSION['score'] = '0';
		}
		$total = $this->getTotal();
		$right = $this->rightAns($number);
		if($right == $selectedAns)
		{
			$_SESSION['score']++;
		}
		if($times == 1)
		{
			header('Location: final.php');
			exit;
		}else{
			header('Location: test.php?q='.$next);
		}
	}
	
	
	public function getTotal()
	{
		//$query = "SELECT * FROM tbl_que";
		//$getResult = $this->db->select($query);
		//$total = $getResult->num_rows;
		$total=20;
		return $total;
	}
	
	private function rightAns($number)
	{
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '1'";
		//echo $query;exit;
		$getdata = $this->db->select($query)->fetch_assoc();
		$result = $getdata['id'];
		return $result;
	}
	
}
?>