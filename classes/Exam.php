<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

class Exam
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();	
		$this->fm = new Format();
	}
	
	public function addQuestion($data)
	{
		//print_r($data);
		$quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
		$ques = mysqli_real_escape_string($this->db->link, $data['ques']);
		$ans = array();
		$ans[1] = $data['choiceOne'];
		$ans[2] = $data['choiceTwo'];
		$ans[3] = $data['choiceThree'];
		$ans[4] = $data['choiceFour'];
		$rightAns = $data['correctNo'];
		
		$query = "INSERT INTO tbl_que(quesNo, que) VALUES('$quesNo', '$ques')";
		$insert_row = $this->db->insert($query);
		if($insert_row)
		{
			foreach($ans as $key=>$ansName)
			{
				if($ansName != '')
				{
					if($rightAns == $key)
					{
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '1', '$ansName')";
					}
					else
					{
						$rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo', '0', '$ansName')";
					}
					$insertrow = $this->db->insert($rquery);
					if($insertrow)
					{
						continue;
					}
					else{
						die("Lỗi chưa rõ :)))...");
					}
				}
			}
			
			$msg = "Thêm câu hỏi thành công!";
		}
	}
	
	public function getQuesByOrder()
	{
		$query = "SELECT * FROM tbl_que ORDER BY quesNo ASC";
		$result = $this->db->select($query);
		return $result;
	}
	
	public function deleteQues($queNo)
	{
		$tables = array("tbl_que","tbl_ans");
		foreach($tables as $table)
		{
			$query = "DELETE FROM $table WHERE quesNo = $queNo";
			$delData = $this->db->delete($query);
		}
		if($delData)
		{
			$msg = "Đã xóa câu hỏi!";
			return $msg;
		}else{
			$msg = "Xóa không thành công!";
			return $msg;
		}
	}
	
	public function getTotalRows()
	{
		$query = "SELECT * FROM tbl_que";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}
	public function getQuestion()
	{
		$query = "SELECT * FROM tbl_que";
		$getData = $this->db->select($query);
		$result = $getData->fetch_assoc();
		return $result;
	}
	
	
	
	public function getQuestionByNumber()
	{
		
		
		$query = "SELECT * FROM tbl_que order by rand() limit 1 " ;
		
		$getData = $this->db->select($query);
		$result = $getData->fetch_assoc();
		
		return $result;
	}
	
	public function getAnswer($numb)
	{
		$query = "SELECT * FROM tbl_ans WHERE quesNo = '$numb'";
		$getData = $this->db->select($query);
		return $getData;
	}
	
	public function getDuration()
	{
		$query = "SELECT * FROM tbl_duration";
		$getData = $this->db->select($query);
		return $getData;
	}
	public function finalScore($id, $score)
	{
		
	$queryAttempt = "SELECT * FROM `tbl_final` WHERE user = '$id'";
		$getDataAttempt = $this->db->select($queryAttempt);
		$result = $getDataAttempt->fetch_assoc();
		
		if($result['attempt'] == 0 || $result['attempt'] == 1 || $result['attempt'] == 2)
		{
		$attempt = $result['attempt'] + 1;
		$query = "UPDATE `tbl_final` SET `attempt` = '$attempt', `score` = '$score' WHERE `tbl_final`.`user` = $id;";
		$this->db->update($query);
		}
	}
	public function showFinalScore($id)
	{
		$query = "SELECT * FROM `tbl_final` WHERE user = '$id'";
		
		$getData = $this->db->select($query);
		$result = $getData->fetch_assoc();
		return $result;
	}
	public function userStatus($id)
	{
		$query = "SELECT * FROM tbl_user WHERE userId = '$id'";
		$getData = $this->db->select($query);
		$result = $getData->fetch_assoc();
		return $result;
	}
	
}
?>