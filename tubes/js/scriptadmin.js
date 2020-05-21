$(document).ready(function () {

	$('#keyword').on('keyup', function () {
		$('#listbuku').load('../ajax/bukuadmin.php?keyword=' + $('#keyword').val());

	});
});
$(document).ready(function () {
	$('.parallax').parallax();
});
