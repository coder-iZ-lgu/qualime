var QLTY = QLTY || {};

QLTY.ui.messager = function(undefined){
 
    var Messager = function(){
	if (Messager.prototype._MessagerInstance){
	    return Messager.prototype._MessagerInstance;
	}
	Messager.prototype._MessagerInstance = this;
	this.isActive = false;
	this.defaultMessage = "";
	this.showMessage = function(elId, msg){
	    if (!elId){
		return;
	    } else {
		console.log("adding message");
		if (this.isActive) this.hideMessage();
		$(document.getElementById(elId)).append(this.createMessage(msg));
		this.isActive = true;
	    }
	}
	
	this.createMessage = function(msg){
	    var message = $(document.createElement("div")).attr({
		    "id" : "messager",
		    "class" : "messager"
		});
	    message.append(
		$(document.createElement("div"))
		    .addClass("message")
		    .append(
			$(document.createElement("span"))
			    .addClass("message-animation")
		    )
		    .append(
			$(document.createElement("span"))
			    .addClass("message-text")
			    .html(msg || this.defaultMessage)
		    )
	    );
	    return message;
	}
	
	this.hideMessage = function(){
	    if(this.isActive){
		$(document.getElementById("messager")).remove();
		this.isActive = false;
	    }
	}
    }
    
    return new Messager();
}();