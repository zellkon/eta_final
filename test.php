<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/test_page_header.php");
Session::checkSession();
if(isset($_GET['q']))
{
	$times = (int)$_GET['q'];
}else{
	header('Location: exam.php');
}



$total = $exm->getTotalRows();
$question = $exm->getQuestionByNumber();
$number=$question['quesNo'];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$process = $pro->processData($_POST);
}


?>   

  <body>
		
    <div class="site-wrapper">
    
        
        <section class="top-banner">
        	<div class="container">
            	<h1>ETA - Cuộc thi tiếng anh chuyên ngành khoa Kế toán Kiểm toán ĐHKT - ĐHQGHN</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                            <div class="col-sm-6 mb-sm-10">
							
                            	<h4>Câu hỏi: <span><?php 
							
								
								echo $times;
								
							
								
								
								?> / <?php echo 20; ?></span></h4>
                            </div><!--/.col-xs-6-->
                            
                            <div class="col-sm-6 txt-sm-right">
                            
                            	<h4>Thời gian còn lại:  <span id="time"></span> s</h4>
                            </div><!--/.col-xs-6-->
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    

                    

<div class="wizard-wrap" id="wizard">

  <div id="rootwizard">
      <div class="navbar">
        <div class="navbar-inner">

           <!-- <div id="bar" class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>-->
			
			<!--/.progress-->          

            <ul class="wizard-nav">
                <li><a href="#tab1" data-toggle="tab"></a></li>
                <li><a href="#tab2" data-toggle="tab"></a></li>
                <li><a href="#tab3" data-toggle="tab"></a></li>
                <li><a href="#tab4" data-toggle="tab"></a></li>
                <li><a href="#tab5" data-toggle="tab"></a></li>
                <li><a href="#tab6" data-toggle="tab"></a></li>
                <li><a href="#tab7" data-toggle="tab"></a></li>
            </ul><!--/.wizard-nav-->
      
        </div>
      </div>
      
      <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <div class="tab-content">
          
          <div class="tab-pane" id="tab1">
            <form method="post" id="questionForm" action="">
            <div class="wiztab-inner">
            	
                <h4 class="question-body"><?php echo $question['que']; ?></h4>
                
                <!--<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong> Please select atleast one option!
                </div>--><!--/.alert-warning-->
                
                <div class="ans-options-wrap">
                  
                  <div class="row">
                  	<?php 
					  $answer = $exm->getAnswer($question['quesNo']);
					  if($answer)
					  {
						  while($result = $answer->fetch_assoc()){
					  ?>
                    <div class="col-sm-6">
                    	<div class="ans-option">
                          <div class="radio radio-success">
                              <input type="radio" name="ans" id="radio<?php echo $result['id']; ?>" required value="<?php echo $result['id']; ?>">
                              <label for="radio<?php echo $result['id']; ?>"><?php echo $result['ans']; ?></label>
                          </div><!--/.radio-->
                            
                        </div><!--/.ans-option-->
                    </div><!--/.col-sm-6-->
                    
                    	<?php }}?>
                  </div><!--/.row-->
                  
                </div><!--/.ans-options-wrap-->
                
            </div><!--/.wiztab-inner-->
            
          </div><!--/.tab-pane-->
          
          <ul class="pager wizard">
            <!--  <li class="previous btn btn-grey pull-left">Prevoius</li>-->
              <li>
              	<input type="submit" name="submit" class="next btn btn-blue pull-right" value="NEXT"/>
              	<input type="hidden" name="number" value="
				<?php
				echo $number;
				?>" class="next btn btn-blue pull-right"/>
				
				<input type="hidden" name="times" value="
				<?php
				echo $times;
				?>" class="next btn btn-blue pull-right"/>
				
				
              	
              </li>
          </ul><!--/.pager wizard-->
</form>
      </div><!--/.tab-content-->
      </div><!--/.col-md-8-->
      </div><!--/.row-->
  </div>

</div><!--/.wizard wrap-->
                    


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
    <script src="js/custom-development.js"></script>
     <script src="js/sweetalert.min.js"></script>
      <script>
		function message()
		{
			//alert('asdkjh');
			swal("NGUY HIỂM!", "CÒN 20 GIÂY THÔI LÀM NHANH LÊN NÀO!", "CẢNH BÁO");
			return false;
			
		}
	</script>
    <script type="text/javascript">
								setInterval( function () {
									$.ajax( {
										type: 'GET',
										url: 'response.php',
										success: function ( data ) {
											$( '#time' ) . html( data );
											if(data == '00:20')
											{
												message();
												$( '.q-timer-bar' ) . css("background-color", "red");
												$( '.q-timer-bar' ) . css("color", "white");
												$( '.q-timer-bar' ) . css("font-weight", "bold");
											}
											if(data == '00:00')
											{
												window.location = 'final.php';
											}
											
										}
									} );
								}, 1000 );
</script>
  </body>
</html>