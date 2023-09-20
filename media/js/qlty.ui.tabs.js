var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.tabs");

QLTY.ui.tabs = function (undefined){
  return {
    init: function(isForTest){
	var t = this;
	$(".tab-set > a").click(function (){
        var c = $(".c");
	    var el = $(this);
	    var taskId = el.parent().attr('data-qlty-task'),
		dataText = el.attr("data-qlty-text");
		parentId = el.parent().attr('id');

	    if (el.hasClass("disabled")) {
			return false;
	    }
	    
	    if (isForTest) {
		if (dataText === "solution") {
		    QLTY.core.test.getCurrentTest().disableTaskOptions(taskId);
		    el.parent().find("[data-qlty-text='actualization']").attr("data-qlty-viewed", "1");
		}

		if (el.attr("data-qlty-viewed") === "0") {
		    QLTY.core.test.getCurrentTest().setPenalty(el.parent().attr("data-qlty-task"));
		    el.attr("data-qlty-viewed", 1);
		}
	    }
	    if (!el.hasClass('item active')){
			el.parent().parent().find(".tab-content").removeClass('active');
			el.parent().find("> a").removeClass('active');
		/*todo: remake*/
		var selector = "#tab-" + dataText + "-" + taskId;
			$(selector).addClass('active');
			el.addClass('active');
	    }
	});
    },
    change_mode: function(mode){
	    console.log("mode is changed to :" + mode);
    },
    block_tabs: function(selector){
	$(selector).removeClass('active').addClass('blocked');
	$(".tab-set").addClass('blocked');
	// todo: handle active class. add it to main text/
    },
    
    setCurrentTab: function(selector) { // selector of tab button
	$(selector).each(function(){
	    var current = $(this),
		taskId = current.parent().attr('data-qlty-task'),
		dataText = current.attr("data-qlty-text");
	    
	    current.parent().find(".tab-content").removeClass('active');
	    $("#tab-" + dataText + "-" + taskId).addClass('active');
	});
    },
    
    activateTabs: function(selectors) {
	if (selectors) {
	    for (var i = 0; i < selectors.length; i++) {	
		$(selectors[i]).removeClass().addClass('item active');
	    }
	}
    },
    deactivateTabs: function(selectors) {
	if (selectors) {
	    for (var i = 0; i < selectors.length; i++) {	
		$(selectors[i]).removeClass('active').addClass('item');
	    }
	}
    },
    disableTabs: function(selectors){
	if (selectors) {
	    for (var i = 0; i < selectors.length; i++) {	
		$(selectors[i]).removeClass().addClass('item disabled');
	    }
	}
    },
    enableTabs: function(selectors){
	if (selectors) {
	    for (var i = 0; i < selectors.length; i++) {
		console.log($(selectors[i]));
		$(selectors[i]).removeClass('disabled');
	    }
	}
    },
    release_tabs: function(selector){
		$(selector).removeClass('blocked');
		$(".tab-set").removeClass('blocked');
		$(".main-tab-content-header").removeClass('active');
    },
    state: {
	is_blocked: false
    },
  }
}();