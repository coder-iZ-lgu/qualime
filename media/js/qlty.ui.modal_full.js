var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.modal");

QLTY.ui.modal = function(undefined){
	function Modal(options){
		this.id = options.id;
		this.title = options.title;
		this.html = options.html;
		this.buttons = options.buttons || [];
		this.className = options.className || "qlty-modal-default",
			this.onClose = (typeof options.onClose == "function") ? options.onClose : null;
		console.log("modal has been created");
		this.init();
	}

	Modal.prototype.open = function(){
		$(document.getElementById(this.id)).toggle();
		$("body").addClass("lock");
	};

	Modal.prototype.close = function(flag){ // false -> no onClose
		if (this.onClose && !flag) {
			this.onClose();
		}
		$(document.getElementById(this.id)).remove();
		$("body").removeClass("lock");
	};

	Modal.prototype.body = function(html){
		if (!html){

			return this.html;
		} else {
			this.html = html;
			$("#" + this.id).find(".qlty-modal-body").html(html);
		}
	};

	Modal.prototype.init = function(){
		var self = this;
		this.html = tmpl(QLTY.config.ui.MODAL_TEMPLATE, {
			id: this.id,
			title: this.title,
			body: this.html,
			buttons: this.buttons
		});
		$("body").append(this.html);
		$(document.getElementById(this.id)).find(".qlty-modal").addClass(this.className);
		$(document.getElementById(this.id)).find(".qlty-close").click(function(){
			self.close();
		});
		for(var i = 0; i < this.buttons.length; i++) {
			$(document.getElementById(this.buttons[i].id)).click(function(counter){
				return function(){
					self.buttons[counter].action(self);
				};
			}(i));
		}
	};

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
	}

	return {
		create_modal: function(options){
			return new Modal(options);
		},
		createSlider: function(options){
			return new Slider(options);
		},
		removeAllModals: function(){
			$(".qlty-modal-holder").each(function(){
				console.log($(this).attr("id"));
				$(this).remove();
			});
		},
		removeAllNotifications: function() {
			console.log(">>>>>>>remove all notifications");
			this.notifier.remove();
		},
		messager: new Messager(),
		notifier: new Notifier()
	};
}();