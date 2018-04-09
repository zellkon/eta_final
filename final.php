<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
Session::checkSession();
$userid = Session::get("userId");


	
if(isset($_SESSION['score']))
{	
	$finalScore = $exm->finalScore($userid, $_SESSION['score']);
	unset($_SESSION['score']);
}

$showScore = $exm->showFinalScore($userid);
$total = $exm->getTotalRows();
?>   
        
        
        <section class="top-banner">
        	<div class="container">
            	<h1>ETA - Cuộc thi tiếng anh chuyên ngành khoa Kế toán Kiểm toán ĐHKT - ĐHQGHN</h1> <?php //echo Session::get("userEmail"); ?>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<strong style="color: green;">Chúc mừng! Bạn đã hoàn thành bài kiểm tra.</strong>
                    </div><!--/.q-timer-bar-->
                   <div class="results" style="margin-left: 300px; margin-top: 20px;">
                     <table style="" width="300" border="1">
					  <tbody>
					  <tr style="background-color: #ffbf00">
					  	<td colspan="2"><strong>Kết Quả</strong></td>
					  </tr>
						<tr>
						  <td><strong>Tổng câu hỏi:</strong></td>
						  <td><strong><?php echo 20;?></strong></td>
						</tr>
						<tr>
						  <td><strong>Đúng:</strong></td>
						  <td><strong><?php echo $showScore['score']; ?></strong></td>
						</tr>
						
						<tr>
						  <td><strong>Tỉ lệ phần trăm đúng:</strong></td>
						  <td><strong><?php 
							  $per = $showScore['score'] / 20 * 100;
							  echo $per;?>%</strong></td>
						</tr>
						<tr>
						  <td><strong>Số lần Làm Bài:</strong></td>
						  <td><strong><?php echo 1;?></strong></td>
						</tr>
						<tr>
						  <td><strong>Tổng điểm:</strong></td>
						  <td><strong><?php echo $showScore['score'];?></strong></td>
						</tr>
						<tr>
						  <td><strong>Kết Quả:</strong></td>
						  <td><strong>
						  
						  <?php 
							  if($per<60)
							  {
							  	echo "Chúc bạn may mắn lần sau!";
							  }else{
								echo "Bạn làm tốt lắm!";
							  }
							  ?>
						  </strong></td>
						</tr>
					  </tbody>
					</table>
					
				</div><!--/. results-->

				   
                    


                </div><!--/.content-inner-->
            </div><!--/.container-->
        </section><!--/.content-wrap-->
    
    
    	
        
        
        
        
        <footer class="footer-wrap">
        	<div class="container">
            	<p class="copyrights-txt">Copyrights (C) 2018 NDTeam</p>
            </div><!--/.container-->
        </footer><!--/.footer-wrap-->
    
    
    

    </div><!--/.site-wrapper-->

    <script src="js/main//jquery-1.12.4.js"></script>
    <script src="js/main/bootstrap.min.js"></script>
    <script src="js/main/jquery-wizard.js"></script>
    <script src="js/main/custom.js"></script>
  
    
  </body>
</html>
