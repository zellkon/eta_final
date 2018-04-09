<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/inc/header.php');
Session::checkSession();
$userid = Session::get("userId");


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$updateUser = $usr->updateUser($userid, $_POST);
}

$getData = $usr->getUserData($userid);

?>   

        <section class="top-banner">
        	<div class="container">
            	<h1>Update Profile</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                            
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    <div class="form-elements" style="padding: 15px;">
						<form action="" method="post">
						<?php if(isset($updateUser))
								{
									echo $updateUser;
								}
							
							?>
							<table style="margin: 0 auto;" width="60%" border="0">
						  <?php if($getData)
								{
									$result = $getData->fetch_assoc();
								
								?> 
							  <tbody>
								<tr>
								  <td width="20%">Thông tin của bạn :</td>
								  <td><input type="text" placeholder="Tên,Trường Học,SDT,..." value="<?php echo $result['userName']; ?>" name="uname"/></td>
								</tr>
								<tr>
								  <td>Email:</td>
								  <td><input type="text" name="email" value="<?php echo $result['userEmail']; ?>" placeholder="Email"/></td>
								</tr>
								<tr>
								  <td>Mật khẩu:</td>
								  <td><input type="text" value="<?php echo $result['userPass']; ?>" name="pass" placeholder="Mật khẩu"/></td>
								</tr>
								
								<tr>
								  <td>&nbsp;</td>
								  <td><input type="submit" name="btnUpdate" value="Cập Nhật"/></td>
								</tr>
							  </tbody>
							  <?php }?>
							</table>

						</form>
					</div><!--/.form-elements-->
                    


                </div><!--/.content-inner-->
            </div><!--/.container-->
        </section><!--/.content-wrap-->
    
    
    	
        
        
        
        
        <footer class="footer-wrap">
        	<div class="container">
            	<p class="copyrights-txt">Copyrights (C) 2018 NDTeam</p>
            </div><!--/.container-->
        </footer><!--/.footer-wrap-->
    
    
    

    </div><!--/.site-wrapper-->

    <script src="js/jquery.1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-wizard.js"></script>
    <script src="js/custom-main.js"></script>
    
  </body>
</html>