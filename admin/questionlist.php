<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./inc/adminheader.php');
include_once($filepath.'/../../classes/Exam.php');
$exm = new Exam();

if(isset($_GET['del']))
{
	$quesNo = (int)$_GET['del'];
	$deleteQues = $exm->deleteQues($quesNo);
}
?>
 
        <section class="top-banner">
        	<div class="container">
            	<h1>Questions</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                           
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    

                    <table width="100%" border="1">
                    <thead>
                    	<th>No</th>
                    	<th>Câu hỏi</th>
                    	<th>Công cụ</th>
                    </thead>
                    <?php 
						$examData = $exm->getQuesByOrder();
						if($examData)
						{
							$i = 0;
							while($result = $examData->fetch_assoc())
							{
								$i++;	
							
						?>
					  <tbody>
						<tr>
						  <td><?php echo $i; ?></td>
						  <td><?php echo $result['que']; ?></td>
						  <td>
						  	<a onClick="return confirm('Bạn có muốn xóa?')" href="?del=<?php echo $result['quesNo'];?>">Xóa</a>
						  	</td>
						  	
						</tr>
						<?php }} ?>
					  </tbody>
					</table>

                    


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