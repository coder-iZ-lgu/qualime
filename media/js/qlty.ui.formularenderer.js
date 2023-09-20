var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.formulaRenderer");

QLTY.ui.formulaRenderer = function(undefined){
    var formulaHolder = undefined,
	    renderButton = undefined,
	    formulaTextarea = undefined,
	    slider = undefined,
	    colors = undefined;
    
    function getCurrentColor(){
	return QLTY.core.utils.rgb2hex($(".formula-active-color").css("background-color"));
    }
    function getCurrentColorId(){
	return $(".formula-active-color").attr("data-qlty-color");
    }
    
    function getRenderedFormula(){
	return formulaHolder.html();
    }
    function getCurrentSize(){
	
    }
    
    return {
	init: function(){
	    console.log("init renderer");
	    formulaHolder = $(document.getElementById("formula-holder"));
	    renderButton = $(document.getElementById("render-formula-button"));
	    formulaTextarea = $(document.getElementById("formula-text"));
	    slider = QLTY.ui.slider.createSlider({id: "formula-size"});
	    colors = $(".formula-color");
	    
	    renderButton.click(function(){
		console.log("render...");
		QLTY.ui.messager.showMessage("formula-holder", "Wait. Rendering");
		$.ajax({
		    type: "POST",
		    url: "/admin/formula/render",
		    data: { text: formulaTextarea.val(), color: getCurrentColorId(), size: slider.getValue()},
		    success: function(response) {
			QLTY.ui.messager.hideMessage();
			formulaHolder.html(response);
		    }
		});
	    });

	    colors.click(function(){
		colors.each(function(){
		    $(this).removeClass("formula-active-color");
		});
		$(this).addClass("formula-active-color");
	    });
	    /*
	    colorList.find("li").click(function(){
		var el = $(this);
		currentColor.attr("data-qlty-color", el.attr("data-qlty-color"));
		currentColor.css("background-color", el.css("background-color"));
	    });
	    */
	},
	getFormula: function(){
	    return getRenderedFormula();
	}
    };
}();
