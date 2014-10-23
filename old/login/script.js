$(function() {
	$('#userLogin').on('click', function(evt) {
		showUserLogin(true);
		evt.preventDefault();
		evt.stopPropagation();
	});
	$('#userLoginBox').on('click', function(evt) {
		evt.preventDefault();
		evt.stopPropagation();
	});
	$('body').on('click', function(evt) {
		showUserLogin(false);
		evt.preventDefault();
		evt.stopPropagation();
	});
});

function showUserLogin(val) {
	if (val) {
		$('#openAccess').css({'height':'0'});
		$('#userLogin').css({'width':'400px'});
		$('#userLoginBox').css({'height':'300px', 'background':'#F8F8FE'});
		$('body').css({'background':'#111'});
		setTimeout(function() {
			$('#loginForm').css({'height':'150px'});
		}, 200);
		return;
	}
	$('#loginForm').css({'height':'0'});
	
	setTimeout(function() {
		$('#openAccess').css({'height':'133'});
		$('#userLogin').css({'width':'104px'});
	
		$('#userLoginBox').css({'height':'137px', 'background':'transparent'});
		$('body').css({'background':'#F8F8FE'});
	}, 400);
}