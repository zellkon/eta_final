<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
Session::checkSession();

?>   
        
        
        <section class="top-banner">
        	<div class="container">
            	<h1>Đáp án đúng</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                            <div class="col-sm-6 mb-sm-10">
                            	<h4>Câu hỏi và đáp án:  <span></span></h4>
                            </div><!--/.col-xs-6-->
                            
                            <div class="col-sm-6 txt-sm-right">
                            	
                            </div><!--/.col-xs-6-->
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    

                    

<div class="wizard-wrap" id="wizard">

  <div id="rootwizard">
      <div class="navbar">
        <div class="navbar-inner">

            <!--<div id="bar" class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>--><!--/.progress-->          

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
       <table>
      <?php $getQues = $exm->getQuesByOrder();
	  if($getQues)
	  {
		  while($question = $getQues->fetch_assoc())
		  {
			?>
			
			  <tr>
			  	<td colspan="2">
			  		<h3><?php echo $question['quesNo']; ?>:<?php echo $question['que']; ?></h3>
			  	</td>
			  </tr>
			    <?php 
			  	$number = $question['quesNo'];
		   		$answer = $exm->getAnswer($number);
			  	if($answer)
				{
					while($result = $answer->fetch_assoc())
					{
					?>
						
						<tr>
							<td>
								<input type="radio" disabled/>
								<?php 
								if($result['rightAns'] == '1')
								{
									echo "<span style='color:green;'>".$result['ans']."<img src='./img/tick.png'/></span>";
								}else{
									echo $result['ans']; 
								}
								?>
							</td>
						</tr>
						
						<?php } }?>
		   		<?php } } ?>
     
      
      
      </table>
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
    
  </body>
</html>