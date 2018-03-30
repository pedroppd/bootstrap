$(function(){
	$('.place').each(function(){
		var place = $(this).attr('title');
		var input = $(this);

		input
		     .val(place)
		     .css('color', 'red');
	});
});