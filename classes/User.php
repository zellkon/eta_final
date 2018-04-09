<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Session.php');
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

class User
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();	
		$this->fm = new Format();
	}
	
	public function getAdminData($data)
	{
		$adminUser = $this->fm->validation($data['adminUser']);	
		$adminPass = $this->fm->validation($data['adminPass']);
		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);
		
	}
	
	public function userRegistration($email,$userName)
	{
		$userName = $this->fm->validation($userName);	
		$email = $this->fm->validation($email);
		//$password = $this->fm->validation($password);
		
		$user = mysqli_real_escape_string($this->db->link, $userName);
		$mail = mysqli_real_escape_string($this->db->link, $email);
		//$pass = mysqli_real_escape_string($this->db->link, $password);
		
		if($mail == "")
		{
			echo "Bắt buộc nhập Email";
			exit;
		}
		else if(filter_var($mail, FILTER_VALIDATE_EMAIL) === false)
		{
			echo "Email không hợp lệ";
			exit;
		}else{
			$chkQuery = "SELECT * FROM tbl_user WHERE userEmail = '$mail'";
			$chkResult = $this->db->select($chkQuery);
			if($chkResult != false)
			{
				echo "Email đã tồn tại!";
				exit;
			}
			else{
				$pass = $this->randomPassword();
				$this->sendMail($mail, $pass);
				
				
				
				$query = "INSERT INTO tbl_user(userName, userPass, userEmail, userStatus) VALUES('$user', '$pass', '$mail', '0')";
				//echo $query;exit;
				$inserted_row = $this->db->insert($query);
				
				$last_id = $this->db->link->insert_id;
				/*****************final table*******************/
				$query1 = "INSERT INTO tbl_final(user, attempt, score) VALUES('$last_id', '2', '0')";
				$this->db->insert($query1);
				/************************************/
				
				if($inserted_row){
					echo "Đã đăng ký thành công!";
					exit;
				}
				else{
					echo "Chưa đăng ký!";
					exit;
				}
			}
		}
	}
	
	public function userLogin($mail, $pass)
	{
		$email = $this->fm->validation($mail);
		$password = $this->fm->validation($pass);
		
		$email = mysqli_real_escape_string($this->db->link, $email);
		$passwrd = mysqli_real_escape_string($this->db->link, $password);
		if($email == "" || $passwrd == "")
		{
			echo "empty";
			exit;
		}else{
			
			$query = "SELECT * FROM tbl_user WHERE userEmail = '$email' AND userPass = '$passwrd'";
			$result = $this->db->select($query);
			if($result != false)
			{
				$value = $result->fetch_assoc();
				if($value['status'] == '1')
				{
					echo "disable";
					exit;
				}
				else{					
					Session::init();
					Session::set("login", true);
					Session::set("userId", $value['userId']);
					Session::set("userName", $value['userName']);
					Session::set("userEmail", $value['userEmail']);
					
				}
			}else{
				echo "error";
				exit;
			}
		}
	}
	
	
	
	public function getUserData($id)
	{
		$query = "SELECT * FROM tbl_user WHERE userId = '$id'";
		
		$result = $this->db->select($query);
		return $result;
	}
	
	 
	public function getAllUsers()
	{
		$query = "SELECT * FROM tbl_user ORDER BY userId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function disableUser($userId)
	{
		$query = "UPDATE tbl_user
					SET
						userStatus = '1'
						WHERE userId = $userId";
		$updated_row = $this->db->update($query);
		if($updated_row)
		{
			$msg = "Đã hủy kích hoạt";
			return $msg;
		}else{
			$msg = "Hủy kích hoạt không thành công";
			return $msg;
		}
	}
	public function enableUser($eblId)
	{
		$query = "UPDATE tbl_user
					SET
						userStatus = '0'
						WHERE userId = $eblId";
		$updated_row = $this->db->update($query);
		if($updated_row)
		{
			$msg = "Kích hoạt thành công";
			return $msg;
		}else{
			$msg = "Kích hoạt không thành công";
			return $msg;
		}
	}
	
	public function updateUser($userid, $data)
	{
		$userName = $this->fm->validation($data['uname']);	
		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['pass']);
		
		$user = mysqli_real_escape_string($this->db->link, $userName);
		$mail = mysqli_real_escape_string($this->db->link, $email);
		$pass = mysqli_real_escape_string($this->db->link, $password);
		
		$query = "UPDATE tbl_user
					SET
						userName = '$user',
						userEmail = '$mail',
						userPass = '$pass'
						WHERE userId = '$userid'";
		//echo $query;exit;
		$updated_row = $this->db->update($query);
		if($updated_row)
		{
			$msg = "Cập nhật thành công";
			return $msg;
		}else{
			$msg = "Cập nhật thất bại (vui lòng liên hệ admin)";
			return $msg;
		}
		
	}
	
	public function deleteUser($deleteId)
	{
		$query = "DELETE FROM tbl_user
						WHERE userId = $deleteId";
		$delete_row = $this->db->delete($query);
		if($delete_row)
		{
			$msg = "Đã xóa";
			return $msg;
		}else{
			$msg = "Chưa xóa";
			return $msg;
		}
	}
	
	private function sendMail($mail, $password)
	{

		$to = $mail;
		$subject = "Chi tiết tài khoản ".$mail;

		$message = "
		<html>
		<head>
		<title>Chi tiết tài khoản</title>
		</head>
		<body>
		<p>Welcome to the Online Exam</p>
		<table>
		<tr>
		<th>Email</th>
		<th>Password</th>
		</tr>
		<tr>
		<td>".$mail."</td>
		<td>".$password."</td>
		</tr>
		</table>
		<p>Cảm ơn bạn đã tham gia thi online , chúc bạn thi tốt.</p>
		</body>
		</html>
		";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <Agile>' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";

		//mail($to,$subject,$message,$headers);

	}
	
	private function randomPassword() {
    $alphabet = '1';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 1; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	}
}
?>