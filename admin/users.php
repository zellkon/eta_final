<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'./inc/adminheader.php');
include_once($filepath.'/../../classes/User.php');
$usr = new User();

if(isset($_GET['dis']))
{
	$dblId = (int)$_GET['dis'];
	$dblUser = $usr->disableUser($dblId);
}

if(isset($_GET['enbl']))
{
	$enblId = (int)$_GET['enbl'];
	$enblUser = $usr->enableUser($enblId);
}
if(isset($_GET['del']))
{
	$delId = (int)$_GET['del'];
	$deleteUser = $usr->deleteUser($delId);
}

?>
 
        <section class="top-banner">
        	<div class="container">
            	<h1>Agile - Exam Admin Panel</h1>
            </div><!--/.container-->
        </section><!--/.top-banner-->
	    
        
        
        
        
        
        <section class="content-wrap">
        	<div class="container">
            	<div class="content-inner">
                	<div class="q-timer-bar">
                    	<div class="row">
                        	
                            <?php
							if(isset($dblUser))
							{
								echo $dblUser;
							}
							?>
                            
                        </div><!--/.row-->
                    </div><!--/.q-timer-bar-->
                    

                    <table width="100%" border="1">
                    <thead>
                    	<th>No</th>
                    	<th>Name</th>
                    	<th>Username</th>
                    	<th>Email</th>
                    	<th>Status</th>
                    	<th>Action</th>
                    </thead>
                    <?php 
						$userData = $usr->getAllUsers();
						if($userData)
						{
							$i = 0;
							while($result = $userData->fetch_assoc())
							{
								$i++;	
							
						?>
					  <tbody>
						<tr>
						  <td><?php echo $i; ?></td>
						  <td><?php echo $result['name']; ?></td>
						  <td><?php echo $result['userName']; ?></td>
						  <td><?php echo $result['userEmail']; ?></td>
						  <td>
						  <?php 
								if($result['userStatus'] == '0')
								{
									echo "<img src='./img/tick.png' alt='as'/>"; 
								}
							  else
							  {
								  echo "<img src='./img/cross.png' alt='as'/>";
							  }
							  ?>
						  
						  </td>
						  <td>
						  <?php if($result['userStatus'] == 0){?>
						  	<a onClick="return confirm('Are you sure to Disable?')" href="?dis=<?php echo $result['userId'];?>">Disable</a>	<?php }else{?>
						  	<a onClick="return confirm('Are you sure to Enable?')" href="?enbl=<?php echo $result['userId'];?>">Enable</a><?php }?> ||
						  	<a onClick="return confirm('Are you sure to Remove?')" href="?del=<?php echo $result['userId'];?>">Remove</a>
						  	</td>
						  	
						</tr>
						
						<?php
						  }
						}
						  ?>
					  </tbody>
					</table>

                    


                </div><!--/.content-inner-->
            </div><!--/.container-->
        </section><!--/.content-wrap-->
    
    
    	
        
        
        
        
        <footer class="footer-wrap">
        	<div class="container">
            	<p class="copyrights-txt">Copyrights (C) 2017 AIIT</p>
            </div><!--/.container-->
        </footer><!--/.footer-wrap-->
    
    
    

    </div><!--/.site-wrapper-->

    <script src="js/jquery.1.12.4.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-wizard.js"></script>
    <script src="js/custom-main.js"></script>
    
  </body>
</html>