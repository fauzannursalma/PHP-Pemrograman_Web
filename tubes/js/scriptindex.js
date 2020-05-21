$(document).ready(function () {

	$('#keyword').on('keyup', function () {
		$('#listbuku').load('ajax/bukuindex.php?keyword=' + $('#keyword').val());

	});
});