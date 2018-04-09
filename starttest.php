<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
Session::checkSession();
$question = $exm->getQuestion();
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
                    	<h1>Luật thi</h1>
                    </div><!--/.q-timer-bar-->
                    
					<ul>
						<li><h2>Có 20 câu hỏi , thời gian làm bài là 30 phút.Mỗi câu hỏi chỉ làm 1 lần và không được sửa,nên các bạn lưu ý phải làm kỹ từng câu.</h2></li>
						<!--<li>You will get 1 point for each correct answer. At the end of the Quiz, your total score will be displayed. Maximum score is 60 points.</li>
						<li>You can never go back once you clicked the next button, so be careful.</li>
						<li>Good Luck for your success.</li>-->
					</ul>
                   
                   <p><h3>Hình thức thi : Trắc nghiệm</h3> </p>
<!--<a href="test.php?q=<?php //echo $question['quesNo']; ?>" class="btn btn-orange">Start Test</a>-->															<?php 
						$userid = Session::get("userId");
						$chkResult = $exm->userStatus($userid);
						if($chkResult['userStatus'] == 1)
						{
						?>
						<button onClick="message();" class="btn btn-orange">BẮT ĐẦU THI</button>
						<?php
						}else{
						?>
						<a href="testinter.php" class="btn btn-orange">BẮT ĐẦU THI</a>
						<?php
						}
							?>


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
     <script src="js/sweetalert.min.js"></script>
      <script>
		function message()
		{
			//alert('asdkjh');
			swal("We're Sorry!", "This user is disabled! Please contact Exam incharge", "error");
			return false;
			
		}
	</script>
    
  </body>
</html>