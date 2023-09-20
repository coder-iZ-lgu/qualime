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

	return {
		create_modal: function(options){
			return new Modal(options);
		},
		removeAllModals: function(){
			$(".qlty-modal-holder").each(function(){
				console.log($(this).attr("id"));
				$(this).remove();
			});
		},
	};
}();