function Lister(options) {
    this.list = $(document.getElementById(options.list));
    this.listWrapper = $(document.getElementById(options.listWrapper));
    this.input = $(document.getElementById(options.input));
    this.saveField = $(document.getElementById(options.saveField));
    this.itemsTemplateId = options.itemsTemplateId || null;
    this.init();
}

Lister.prototype.init = function() {
    var self = this;
    console.log("init");
    console.log(this.list);
    console.log(this.input);
    console.log(this.saveField);
    
    this.input.on('focus',function(e) {
	console.log("show");
	self.listWrapper.show();
    });
	
    this.input.on('blur',function(e) {
	console.log("blur");
	self.listWrapper.hide();
    });
	
    $(this.list).on('mouseover', function(e) {
	var target = $(e.target);
	if (target.is("li")) {
	    self.list.find(".test-active").removeClass("test-active");
	    target.addClass("test-active");
	}
    });
    
    $(this.list).on('click', function(e) {
	var target = $(e.target);
	self.select(target);
    });
    
    $(this.input).on("keyup", function(e) {
	e.preventDefault();
	e.stopPropagation();
	
	if (e.keyCode == 40) {
	    self.next();
	} else if (e.keyCode == 38) {
	    self.prev();
	} else if (e.keyCode == 13) {
	    self.select(self.list.find(".test-active"));
	}
    });
}

Lister.prototype.next = function() {
    var lst = this.list.find("li");
    var current = this.list.find(".test-active");
    var listHeight = this.list[0].clientHeight;
    var viewHeight = mh.height();
    var index = lst.index(current);
    console.log(listHeight + " " + viewHeight + " " + current.height() + " " + lst.index(current));
    if (!current.is("li")) {
	this.list.children().first().addClass("test-active");
	return false;
    }
    
    if (index > 0 && (index+3)*current.height() > viewHeight) {
	console.log(this.listWrapper[0].scrollTop);
	this.listWrapper[0].scrollTop = this.listWrapper[0].scrollTop + current.height();
	console.log("got");
    }
    var next = current.next();
    if (next.is("li")) {
	current.removeClass("test-active");
	next.addClass("test-active");
    }
}
Lister.prototype.prev = function() {
    var lst = this.list.find("li");
    var current = this.list.find(".test-active");
    var listHeight = this.list[0].clientHeight;
    var viewHeight = this.listWrapper.height();
    var index = lst.index(current);
    
    
    
    console.log(this.listWrapper[0].scrollTop + " " + (index+3)*current.height() + " <<" + index);
    if (index > 0 && (index+3)*current.height() > this.listWrapper[0].scrollTop) {
	console.log(this.listWrapper[0].scrollTop + " " + (index+3)*current.height() + " <<");
	this.listWrapper[0].scrollTop = this.listWrapper[0].scrollTop - current.height();
	console.log("got");
    }
    
    
    var prev = current.prev();
    if (prev.is("li")) {
	current.removeClass("test-active");
	prev.addClass("test-active");
    }
}

Lister.prototype.select = function(el) {
    this.setValue(el.html(), el.attr("qlty-data-city"));
    this.list.children().remove();
    this.listWrapper.toggle();
}

Lister.prototype.setValue = function(field, value) {
    if (field) {
	this.input.val(field);
    }
    if (value) {
	this.saveField.val(value);
    }
}

Lister.prototype.getItems = function(options) {
    $.ajax({
	type: "POST",
	data: options.data,
	url: options.url,
	dataType: 'json',
	success: function(response) {
	    options.onSuccess(response);
	},
	error: function(request, status, error) {
	    options.onError(error);
	}
    });
}

function Registrator(options){
    this.fields = options.fields || [];
    this.lister = options.lister || null;
    this.currentCountry = -1;
    this.currentCity = -1;
    this.isSending = false;
    this.init();
}

Registrator.prototype.init = function() {
    var self = this;
    if (this.lister) {
	this.lister.input.on('keypress',function(e) {
	    if (e.keyCode == 13) {
		e.preventDefault();
	    }
	});
	
	this.lister.input.on('keyup', function(e) {
	   console.log(e.keyCode);
	    if (e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode == 8 || e.keyCode == 46) {
		var input = self.lister.input;
		console.log(input.val());
		console.log(self.isSending);
		if (input.val().length >=2 && !self.isSending) {
		    self.isSending = true;
		    		
		    self.lister.getItems({
			url: "/ajax/cities/" + self.country(),
			data: {city: input.val()},
			onSuccess: function(response) {
			    self.lister.list.html(tmpl(self.lister.itemsTemplateId , {items: response}));
			    self.isSending = false;
			},
			onError: function() {
			    console.log("ERROR");
			    self.isSending = false;
			}
		    });
		}
	    }
	});
    }
    
    $(document.getElementById("countries-list")).on("change", function() {
	self.country($(this).val());
	self.city(-1);
	$(document.getElementById("city-field")).val("");
    });
}
Registrator.prototype.city = function(c) {
    if (c) {
	this.currentCity = c;
    } else {
	return this.currentCity;
    }
}

Registrator.prototype.country = function(c) {
    if (c) {
	this.currentCountry = c;
    } else {
	return this.currentCountry;
    }
}

Registrator.prototype.doThing = function() {console.log("DoThing");}
Registrator.prototype.addField = function(field) {
    
}
Registrator.prototype.removeField = function(name) {}
Registrator.prototype.changeField = function(name, regexp) {}

$(function() {
    var lister = new Lister({
	list: "cities-holder",
	listWrapper: "lister-holder-wrapper",
	itemsTemplateId: "cities_template",
	input: "city-field",
	saveField: "city-hidden"
    });
    var r = new Registrator({lister: lister});
    //var lister2 = new Lister({list: "cities-holder"});

    /*
    el.on('keyup', function() {
	div.html("");
	if (el.val().length >= 2) {
	    if (!sending) {
		sending = true;
		console.log("sending ajax");
		console.log(el.val());
		$.ajax({
		    type: "POST",
		    data: {city: el.val()},
		    url: "/ajax/cities/3/",
		    dataType: 'json',
		    success: function(response) {
			sending = false;
			console.log(response);
			div.html(tmpl("cities_template", {cities: response}));
			
		    },
		    error: function(request, status, error) {
			console.log(request);
			console.log("error");
			sending = false;
		    }
		});
	    }
	} else {
	    div.html("");
	}
    });
    */
});