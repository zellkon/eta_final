<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./inc/adminheader.php');
include_once($filepath.'/../../classes/Exam.php');
$exm = new Exam();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$exm->addQuestion($_POST);
}

$total = $exm->getTotalRows();
$next = $total + 1;
?>    
        <section class="top-banner">
        	<div class="container">
            	<h1>Thêm Câu Hỏi</h1>
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
							<table style="margin: 0 auto;" width="60%" border="0">
							  <tbody>
								<tr>
								  <td width="20%">Đây là câu hỏi thứ : </td>
								  <td><input type="number" value="<?php if(isset($next)){echo $next;} ?>" name="quesNo"/></td>
								</tr>
								<tr>
								  <td>Câu hỏi:</td>
								  <td><input type="text" name="ques" placeholder="Nhập câu hỏi"/></td>
								</tr>
								<tr>
								  <td>Đáp án 1:</td>
								  <td><input type="text" name="choiceOne" placeholder="Nhập đáp án 1"/></td>
								</tr>
								<tr>
								   <td>Đáp án 2:</td>
								  <td><input type="text" name="choiceTwo" placeholder="Nhập đáp án 2"/></td>
								</tr>
								<tr>
								   <td>Đáp án 3:</td>
								  <td><input type="text" name="choiceThree" placeholder="Nhập đáp án 3"/></td>
								</tr>
								<tr>
								   <td>Đáp án 4:</td>
								  <td><input type="text" name="choiceFour" placeholder="Nhập đáp án 4"/></td>
								</tr>
								<tr>
								   <td>Đáp án đúng:</td>
								  <td><input type="number" name="correctNo" placeholder="Nhập đáp án đúng"/></td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
								  <td><input type="submit" name="btnSubmit" value="Thêm câu hỏi"/></td>
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