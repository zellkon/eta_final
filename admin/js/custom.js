jQuery(function($){
	"use strict";
    /* -------------------------------------------------------------------------
     * Document Ready
     * -------------------------------------------------------------------------
     * 
     */
    $(document).ready(function(){
        
	// Bootstrap Wizard Init
	try{
	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
	var $total = navigation.find('li').length;
	var $current = index+1;
	var $percent = ($current/$total) * 100;
	$('#rootwizard .progress-bar').css({width:$percent+'%'});
	}});
	}catch(e){}
	
		
	// Bootstrap PopOver Init
	$(function () {
	$('[data-toggle="popover"]').popover({
		html: true,
		animation: true
	});
	});
	
	// Body overflow Hidden on Modal open
	$('.modal').on('shown.bs.modal',function(){
	  $("body").addClass("modal-open");
		console.log("Open");
	});
	$('.modal').on('hidden.bs.modal',function(){
	  $("body").removeClass("modal-open");
		console.log("Close");
	});
		
	
		
		
		
		
		
		$(".mod-share-btn").click(function() {
			$( ".share-strip" ).toggleClass( "share-toggle" );
		});
		
		
		
    }); // end document.ready
    
    /* -------------------------------------------------------------------------
     * Window Load
     * -------------------------------------------------------------------------
     * 
     */
    $(window).on('load',function(){
        // Write your code here
    });
    
    /* -------------------------------------------------------------------------
     * Window Resize
     * -------------------------------------------------------------------------
     * 
     */
    $(window).on('resize',function(){
        // Write your code here
    });
	
});