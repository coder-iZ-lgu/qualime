var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.sectionsToggler");

QLTY.ui.sectionsToggler = (function(){
    var changeToggledStyle = function(el) {
	var eChildren = $(el).children();
	if (eChildren.hasClass("section-toggled")) {
	    eChildren.removeClass("section-toggled").addClass("section-untoggled");
	} else {
	    eChildren.removeClass("section-untoggled").addClass("section-toggled");
	}
    }
    return {
	init: function(){
	    $(".section-toggler:gt(0)").each(function(){
		var el = $(this);
		changeToggledStyle(el);
		el.next().toggle();
	    });
	    
	    $(".section-toggler").on("click", function(){
		var el = $(this);
		changeToggledStyle(el);
		el.next().slideToggle(300);
	    });   
	}
    }
})();

