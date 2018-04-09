<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./inc/adminheader.php');
include_once($filepath.'/../../classes/Result.php');
$rslt = new Result();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnAddStd']))
{
	$targetdir = "pix/";
	$targetfile =  $targetdir.basename($_FILES['imageUp']['name']);
	move_uploaded_file($_FILES["imageUp"]["tmp_name"], $targetfile);
	
	$stdInfo = $rslt->addStudentInfo($_POST, $targetfile);
}
?>    
        <section class="top-banner">
        	<div class="container">
            	<h1>Add New Questions</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                            
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    <a href="index.php" class="btn btn-orange">Home</a>
					<a href="users.php" class="btn btn-orange">Quản Lý Người Dùng</a>
                    <a href="questionlist.php" class="btn btn-orange">Quản Lý Câu Hỏi</a>
                    <a href="resultup.php" class="btn btn-orange">Upload Kết Quả</a>
                    <div class="form-elements" style="padding: 15px;">
						<form action="" method="post" enctype="multipart/form-data">
						<?php 
							if(isset($status) && $status == true)
							{
								?>
								<span style="width: 100%; height: 100px; background-color: green; color: white;">Record has Been inserted</span>
								<?php
							}
							else{
								?>
								<span style="width: 100%; height: 100px; background-color: red; color: white;">There seems an error</span>
								<?php
							}
							?>
							<table style="margin: 0 auto;" width="60%" border="0">
							  <tbody>
								
								<tr>
								  <td>Student Reg#:</td>
								  <td><input type="number" name="reg" placeholder="Enter Registration Number"/></td>
								</tr>
								<tr>
							  <tr>
								  <td>Student Name:</td>
								  <td><input type="text" name="sname" placeholder="Enter Name"/></td>
								</tr>
								<tr>
								  <td>Father/Guardian Name:</td>
								  <td><input type="text" name="fname" placeholder="Enter father/guardian Name"/></td>
								</tr>
								<tr>
								   <td>CNIC:</td>
								  <td><input type="text" name="cnic" placeholder="Enter CNIC number"/></td>
								</tr>
								<tr>
								   <td>Father CNIC:</td>
								  <td><input type="text" name="fcnic" placeholder="Enter Father CNIC"/></td>
								</tr>
								<tr>
								   <td>Mobile Number:</td>
								  <td><input type="text" name="mobile" placeholder="Enter mobile number"/></td>
								</tr>
								<tr>
								   <td>Upload an image:</td>
								  <td><input type="file" name="imageUp"/></td>
								</tr>
								
								  <td>&nbsp;</td>
								  <td><input type="submit" name="btnAddStd" class="btn btn-orange" value="Add Student"/></td>
								</tr>
							  </tbody>
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