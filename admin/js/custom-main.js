jQuery(function($){
	"use strict";
    /* -------------------------------------------------------------------------
     * Document Ready
     * -------------------------------------------------------------------------
     * 
     */
    $(document).ready(function(){
		
        // Start Multistep Wizard Init
		$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		  var $total = navigation.find('li').length;
		  var $current = index+1;
		  var $percent = ($current/$total) * 100;
		  $('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});
		// End Multistep Wizard Init
	
    });
    
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