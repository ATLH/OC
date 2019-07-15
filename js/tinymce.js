tinymce.init(
	{
		selector: "#add_editor",
		plugins : "advlist autolink link image lists charmap print preview fullscreen ",
		height : 500,
		language : "fr_FR",
		images_upload_url: 'postAcceptor.php',
		plugins: "image,paste",
		force_p_newlines : false,
	}
);

tinymce.init(
	{
		selector: "#set_editor",
		plugins : "advlist autolink link image lists charmap print preview fullscreen",
		height : 500,
		language : "fr_FR",
		images_upload_url: 'postAcceptor.php',
		
	}
);