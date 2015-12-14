jQuery("#import-demo").click(function() {
	jQuery("#import-loader").show();
	jQuery.ajax({  
		type: "POST",  
		url: "/wp-admin/import.php?id=demo",
		success: function(){
            jQuery("#import-loader").hide(); 
            }
		
		}); 
});