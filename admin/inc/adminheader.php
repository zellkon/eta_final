<?php
ob_start();
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../../lib/Session.php');
Session::checkAdminSession();

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

    <title>Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom-main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>

    <div class="site-wrapper">
    
     
        <header class="head-wrap">
        	<div class="container">
            	<div class="row">
                	<div class="col-xs-4">
                    	<a href="index.php"><img src="img/logo.png" width="230" alt=""/></a>
                    </div><!--/.col-xs-6-->
                    <?php
					if(isset($_GET['action']) && $_GET['action']== 'logout')
					{
						Session::destroy();
						header('Location:login.php');
						exit;
					}
					?>
                    <div class="col-xs-8 text-right">
                    	<a href="users.php" class="btn btn-orange">Manage Users</a>
                    	<a href="quesadd.php" class="btn btn-orange">Add Ques</a>
                    	<a href="questionlist.php" class="btn btn-orange">Ques List</a>
                    	<a href="?action=logout" class="btn btn-orange">Logout</a>
                    </div><!--/.col-xs-6-->
                </div><!--/.row-->
            </div><!--/.container-->
        </header><!--/.head-wrap-->