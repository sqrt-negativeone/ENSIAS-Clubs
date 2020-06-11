
$('#usr_rslt_out').on('click', function () {
	var img_src = $('#usr_rslt_out').find('img').attr('src');
	$('#pdp-container').find('img').attr('src',img_src);
	
});