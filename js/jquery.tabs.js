$(function(){
	$('.tabbox:first').show();
	$('#tab li:first').addClass('active');
	$('#tab li').click(function() {
		$('#tab li').removeClass('active');
		$(this).addClass('active');
		$('.tabbox').hide();
		$($(this).find('a').attr('href')).fadeIn();
		return false;
	});
});
