<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
//Session::checkSession();
$userid = Session::get("userId");
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
                    	<span style="font-size: 28px; font-weight: bold;">Ban Tổ Chức</span>
                    </div><!--/.q-timer-bar-->
                    
					<p style="padding-left: 28px;">
						
							<h4>Liên chi Đoàn khoa Kế toán kiểm toán, trường ĐHKT - ĐHQGHN</li>
							<h4>Mọi thông tin xin liên hệ:</li>
							<h4>Dương Mỹ Hạnh - 0912311197</li>
							
						
						 </p>
                    <?php  $attemptCheck = $exm->showFinalScore($userid); 
					if($attemptCheck['attempt'] >= 3)
					{?>
						<button style="margin-left: 28px;" onClick="message();"; class="btn btn-orange">XEM THỂ LỆ THI</button>
						<?php
					}else{
						echo '<a href="starttest.php" style="margin-left: 28px;" class="btn btn-orange">XEM THỂ LỆ THI</a>';
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
			swal("Xin lỗi!", "Đừng Cố quá thành quá cố !", "Lỗi");
			return false;
			
		}
	</script>
    
  </body>
</html>