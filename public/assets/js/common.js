$(function(){
	
	//$('.carousel').carousel();
	
	$('.dropdown-toggle').click(function(){
		var $selector = $(this).data('target');
		
		if(!$selector) $selector = $(this).attr('href');
		
		$($selector).slideToggle(300);
		
		return false;
	});


	
});