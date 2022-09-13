$(window).scroll(function() {
	if ($(this).scrollTop() > 50){
		$('#header1').addClass("sticky");
	}   
	else{
		$('#header1').removeClass("sticky");
	}
});