(function() {
	$('#post-title').blur( function() {
		var title_text = $('#post-title').val().toLowerCase();

		var slug_text = title_text.replace(/\ /g, '_');

		$('#post-slug').val(slug_text);
	});
})();