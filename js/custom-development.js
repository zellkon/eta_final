// JavaScript Document
$(function(){
	//for user registration
	$("#regSubmit").click(function(){
		
		var regEmail 	= $("#regEmail").val();
		var regUserName 	= $("#regUserName").val();
		//var dataString = 'email='+regEmail;
		var dataString = 'name='+regUserName+'&email='+regEmail;
		$.ajax({
			type:'POST',
			url:'getregister.php',
			data: dataString,
			success:function(data){
				$('#state').html(data);
			}
		});
		
		
		
		return false;
	});
	//for user Login
	$("#loginSubmit").click(function(){
		
		var loginEmail 	= $("#loginEmail").val();
		var loginPassword = 1;
		var dataString = 'logEmail='+loginEmail+'&logPass='+loginPassword;
		
		$.ajax({
			type:'POST',
			url:'getlogin.php',
			data: dataString,
			success:function(data){
				if($.trim(data) == "empty")
				{
					$('.empty').show();
					setTimeout(function(){
						$('.empty').fadeOut();
					}, 3000);
				}else if($.trim(data) == "disable")
				{
					$('.disable').show();
					setTimeout(function(){
						$('.disable').fadeOut();
					}, 3000);
				}else if($.trim(data) == "error")
				{
					$('.error').show();
					setTimeout(function(){
						$('.error').fadeOut();
					}, 3000);
				}else{
					window.location= "exam.php";	
				}
			}
		});
		return false;
	});
	
});

