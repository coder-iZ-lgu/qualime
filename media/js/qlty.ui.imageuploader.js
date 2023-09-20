var QLTY = QLTY || {};

QLTY.ui.imageUploader = function(undefined){
    var isImageUploaded = false,
	    imageInput = undefined,
	    imageHolder = undefined,
	    image = undefined,
	    form = undefined,
	    uploadOptions = {
		success: onSuccess,
	    };
    
    function onSuccess(responseText, status){
	image = $(responseText);
	imageHolder.append(image);
    }
    
    return {
	init: function(){
	    console.log('init uploader 1');
	    form = $(document.getElementById("qlty-upload-image"));
	    imageInput = $(document.getElementById("qlty-image-to-upload"));
	    imageHolder = $(document.getElementById("uploaded-image"));

	    form.submit(function(){
		$(this).ajaxSubmit(uploadOptions);
		return false;
	    });

	    imageInput.change(function(){
		form.submit();
	    });
	    
	},
	getImage: function(){
	    return imageHolder.html();
	},
	getImageSrc: function(){
	    return image.attr("src");
	}
    };
}();