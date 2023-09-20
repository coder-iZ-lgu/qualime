$(function(){

    /*$(window).on("scroll", function() {
	if ($(this).scrollTop() > 170) {
	    $(document.getElementById("test-info-bar")).addClass("particular-test-header-fixed");
	} else {
	    $(document.getElementById("test-info-bar")).removeClass("particular-test-header-fixed");
	}
    });*/
    
    var test = QLTY.core.test.getCurrentTest();
    test.init();
    test.countTasks();
    QLTY.ui.tabs.init(true);
    
    $("#check-button").click(function(){
	QLTY.core.test.getCurrentTest().end();
    });
});