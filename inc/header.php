<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../lib/Session.php');
Session::init();
//Session::checkLogin();
Session::checkSession();
include_once($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php');

spl_autoload_register(function($class){
	include_once "classes/". $class. ".php";
});

$db = new Database();
$fm = new Format();
$usr = new User();
$exm = new Exam();
$pro = new Process();
header('Cache-Control: no-store, no-chache, must-revallidate');
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified:". gmdate("D, d M Y H:i:s". " GMT"));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta content="text/html" http-equiv="Content-Type" charset="utf-8"/>
    <meta http-equiv="pragma" content="no-cache"/>
    <meta http-equiv="no-cache"/>
    <meta http-equiv="Expires" content="-1"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>

    <title>ETA - Cuộc thi tiếng anh chuyên ngành khoa Kế toán Kiểm toán ĐHKT - ĐHQGHN</title>

    <link href="css/main/bootstrap.min.css" rel="stylesheet">
    <link href="css/main/custom.css" rel="stylesheet">
    <link href="css/main/plugins.css" rel="stylesheet">
    <link href="css/main/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
	  history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});
	  </script>
    
  </head>

  <body>
					<?php
						if(isset($_GET['action']) && $_GET['action']== 'logout')
						{
							Session::destroy();
							header("Location:index.php");
							exit;
						}
					?>
    <div class="site-wrapper">
    
        <header class="head-wrap">
        	<div class="container">
            	<div class="row">
                	<div class="col-xs-6">
						<a href="#"><img src="img/logo1.png" width="70" alt=""/></a>
                    	<a href="#"><img src="img/logo2.png" width="70" alt=""/></a>
						<a href="#"><img src="img/logo3.png" width="70" alt=""/></a>
						<a href="#"><img src="img/logo4.png" width="70" alt=""/></a>
						<a href="#"><img src="img/logo5.png" width="70" alt=""/></a>
						<a href="#"><img src="img/logo6.png" width="70" alt=""/></a>
						<a href="#"><img src="img/logo7.jpg" width="70" alt=""/></a>
                    </div><!--/.col-xs-6-->
                    
                    <div class="col-xs-6 text-right">
                    	<!--<a href="exam.php" class="btn btn-orange">Exam</a>
                    	<a href="profile.php" class="btn btn-orange">profile</a>
                    	<a href="?action=logout" class="btn btn-orange">Logout</a>-->
                    	<!-- Split button -->
						<div class="btn-group">
					  <?php $email = Session::get("userEmail");?>
						  <button type="button" class="btn btn-warning"><?php echo $email; ?></button>
						  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="caret"></span>
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <ul class="dropdown-menu">
							<li><a href="exam.php">Bắt Đầu Thi</a></li>
							<li><a href="profile.php">Đổi Thông Tin Cá Nhân</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="?action=logout">Đăng Xuất</a></li>
						  </ul>
						</div>
                    	
                    </div><!--/.col-xs-6-->
                </div><!--/.row-->
            </div><!--/.container-->
        </header><!--/.head-wrap-->
        
        