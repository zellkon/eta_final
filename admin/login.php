<?php 
header('Cache-Control: no-store, no-chache, must-revallidate');
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified:". gmdate("D, d M Y H:i:s". " GMT"));

$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../classes/Admin.php');
include_once($filepath.'/../lib/Session.php');
Session::checkAdminLogin();
$ad = new Admin();


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$adminData = $ad->getAdminData($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <title>ADMIN AREA</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/plugins.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  
   <body>
   
   <div class="site-wrapper">
   
	   		<div class="page-wrap member-page">
            
		   <div class="row m-0">
		   
			   <div class="col-sm-6 col-sm-push-6 p-0">
			   
				   <div class="member-col member-left">
				   		<div class="member-overlay">
					   <div class="member-col-inner">
						   <div class="member-form-wrap">
						   <span><?php if(isset($adminData))
									{
										echo $adminData;
									}
									?></span>
								<form method="post">
						   
							   <h1><b>ETA - Cuộc thi tiếng anh chuyên ngành khoa Kế toán Kiểm toán ĐHKT - ĐHQGHN</b></h1>
							   <p>Hãy bảo mật tài khoản của bạn</p>
								<input type="text" class="form-control" name="adminUser" placeholder="Enter User Name">
								<input type="password" class="form-control" name="adminPass" placeholder="Enter Password">
							   
                               <div class="row">
                               		<div class="col-xs-6">
                                    	<!--<label><input type="checkbox">Đăng Nhập Lần Sau</label>-->
                                    </div><!--/.col-xs-6-->
                                    
                                    <div class="col-xs-6">
                                    	<input type="submit" class="btn btn-blue btn-block" value="Đăng Nhập"/>
                                    </div><!--/.col-xs-6-->
                               </div><!--/.row-->
                               
                               </form>
							   
							   <span class="member-or">HOẶC</span>
							   
							   <input type="text" class="form-control" placeholder="Nhập email để đăng ký">
							   <a href="#" class="btn btn-blue btn-block">Đăng Ký Mới</a>
								
						   </div><!--/.member-form-wrap-->
					   </div><!--/.member-col-inner-->
					   </div><!--/.member-overlay-->
				   </div><!--/member-col-wrap-->
			   </div><!--/.col-md-6-->
			   
			   <div class="col-sm-6 col-sm-pull-6 p-0">
			   	<div class="member-col member-right">
				   	<div class="member-col-inner">
					   </div><!--/.member-col-inner-->
				   </div><!--/member-col-wrap-->
			   </div><!--/.col-md-6-->
			   
		   </div><!--/.row-->
	   		</div><!--/.member-page-->
	   </div><!--/.site-wrapper-->
    
    
    
    
    <script src="js/jquery.1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>