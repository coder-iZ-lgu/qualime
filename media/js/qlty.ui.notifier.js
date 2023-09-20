var QLTY = QLTY || {};

QLTY.ui.notifier = function(undefined){    
    var Notifier = function(){
	if (Notifier.prototype._Notifier){
	    return Notifier.prototype._Notifier;
	}
	Notifier.prototype._Notifier = this;
	
	this.defaultMessage = "";
	this.isCreated = false;
	this.isVisible = false;
	
	this.show = function(msg, delay){
	    var self = this;
	    if (!this.isCreated){
		$("body").append(this.createNotification(msg));
		this.isCreated = true;
	    } else {
		$(document.getElementById("notification-text")).html(msg);
	    }
	    $(document.getElementById("qlty-notification")).animate({top: "210px"}).delay(delay || 3000).animate({top: "-100px"});
	    this.isVisible = true;
	}
	
	this.remove = function(){
	    $(document.getElementById("qlty-notification")).css({top: "-100px"});
	}
	this.hide = function(){
	    console.log("hiding");
	    console.log($(document.getElementById("qlty-notification")));
	    $(document.getElementById("qlty-notification")).animate({top: "100px"});
	    this.isVisible = false;
	}
	
	this.createNotification = function(msg){
	    var notification = $(document.createElement("div")).attr({
		"id": "qlty-notification",
		"class": "notification"
	    });

	    notification
		.append(
		    $(document.createElement("a"))
			.addClass("close-notification")
			.attr({href: "javascript:;"})
		)
		.append(
		    $(document.createElement("p"))
			.attr({"class": "notification-text yellow", "id":"notification-text"})
			.html(msg || this.defaultMessage)
	    );
	    return notification;
	}
	this.removeAllNotifications = function() {
	    this.remove();
	}
    }
    
    return  new Notifier();
}();