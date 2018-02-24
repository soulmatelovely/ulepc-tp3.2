$('.seach_img').click(function(){
	var seach_val=$('.seach_val').val();
	var url=$(this).attr('url')+'?app_name='+seach_val;
	window.open(url); 
 	// window.location=url;
})