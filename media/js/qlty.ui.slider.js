var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.slider");

QLTY.ui.slider = function(undefined){    
    function Slider(options){
	var slider = $(document.getElementById(options.id)),
	    sliderOffset = slider.offset(),
	    thumb = slider.find(".slider-thumb"),
	    thumbWidth = thumb.width(),
	    range = { start: 0, end: 100, current: 1 },
	    steps = options.steps || 3,
	    thumbOffset = Math.round(thumbWidth/2),
	    rightEdge = slider.width() + sliderOffset.left - thumbOffset,
	    leftEdge = sliderOffset.left - thumbOffset;

	slider.on("dragstart", false);
	thumb.on("mousedown", function(e){
	    startSliding();
	    return false;
	});

	function startSliding(){
	    $(document).on({
		"mousemove.slider" : slide,
		"mouseup.slider" : endSliding
	    });
	}

	function slide(e){   
	    var newThumbPosition = e.pageX - sliderOffset.left - thumbOffset;

	    if (e.pageX < leftEdge + thumbOffset){
		newThumbPosition = 0 - thumbOffset;
	    } else if (e.pageX > rightEdge + thumbOffset){
		newThumbPosition = rightEdge - sliderOffset.left;
	    }
	    slideTo(newThumbPosition + thumbOffset);
	}

	function endSliding(){
	    magnetThumb();
	    $(document).off(".slider");
	}

	function magnetThumb(){
	    var shift = Math.round(slider.width()/steps);
	    var left = parseInt(thumb.css("left")) + thumbOffset;
	    var step = Math.floor(left/shift);

	    if(left > leftEdge ||  left < rightEdge){
		if (left%shift > Math.round(shift/2) ) {
			offset = (step + 1)*shift;
		} else {
			offset = step * shift;
		}
		range.current = Math.floor(offset / shift)+1;
		slideTo(offset);
	    }
	}

	function setValue(val){
	    var shift = Math.round(slider.width()/steps);
	    if (val < 0){ 
		    slideTo(0);
		    return;
	    }
	    if (val > steps) {
		    slideTo(slider.width());
		    return;
	    }

	    slideTo(val * shift);
	}

	function slideTo(x){
	    thumb.css("left", x - thumbOffset);
	}

	function getValue(){
	    return range.current;
	}

	this.setValue = setValue;
	this.getValue = getValue;
    }
    
    return {
	createSlider: function(options){
	    return new Slider(options);
	},
	removeAllModals: function(){
	    $(".dimmer").each(function(){
		console.log($(this).attr("id"));
		$(this).remove();
	    });
	}
    };
}();