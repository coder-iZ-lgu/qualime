var QLTY = QLTY || {};
QLTY.createNS("QLTY.core.test");

Switcher = function(){
    this.state = 0;
    this.firstItem = $(document.getElementById("switcher-item-1"));
    this.secondItem = $(document.getElementById("switcher-item-2"));
    this.onOn;
    this.onBeforeOn;
    this.onBeforeOff;
    this.onOff;
    this.init();
}

Switcher.prototype.init = function(){
    var self = this;
    this.firstItem.on("click", function(e) {
	e.preventDefault();
	if (self.state === 1) {
	    self.setOff();
	}
    });
    
    this.secondItem.on("click", function(e) {
	e.preventDefault();
	if (self.state === 0) {
	    self.setOn();
	}
    });
}

Switcher.prototype.setOff = function() {
    if (typeof this.onBeforeOff == "function") {
	if (this.onBeforeOff()) {
	    return;
	}
    }
    this.state = 0;
    if (this.onOff && typeof this.onOff == "function") {
	this.onOff();
    }
}

Switcher.prototype.setOn = function() {
    if (typeof this.onBeforeOn == "function") {
	if (this.onBeforeOn()) {
	    return;
	}
    }
    this.state = 1;
    if (this.onOn && typeof this.onOn == "function") {
	this.onOn();
    }
}

Switcher.prototype.toggle = function() {
    if (typeof this.onBeforeOn == "function") {
	if (this.onBeforeOn()) {
	    return;
	}
    }
    if (this.state === 0) {
	this.setOn();
    } else {
	this.setOff();
    }
}
Timer = function(options) {
    this.interval = options.interval || 100000;
    this.onTimerOut = options.onTimerOut || null;
    this.holder = $(document.getElementById(options.holder)) || null;
    this.iconHolder = (this.holder) ? this.holder.children("i") : null;
    this.valueHolder = (this.holder) ? this.holder.children("span") : null;
    this.template = options.template || "h:m:s";
    this.timer;
    this.isRunning = false;
    this.state = 0; // 0- green, 1 - yellow, 2 - red
    this.currentTime;
    this.targetTime;
}

Timer.prototype.start = function() {
    this.isRunning = true;
    this.currentTime = new Date();
    this.targetTime = new Date(this.currentTime.getTime() + this.interval);
    var self = this;
    this.renderTime();
    this.timer = setInterval(function() {
	self.renderTime();//!! setInterval is evel, remake!
    }, 1000);
}

Timer.prototype.stop = function() {
    this.isRunning = false;
    clearInterval(this.timer);
    if (typeof this.onTimerOut == "function") {
	this.onTimerOut();
    }
}
Timer.prototype.reset = function() {
    this.isRunning = false;
    clearInterval(this.timer);
    this.setMode(0);
    this.valueHolder.html("00:00:00");
}
Timer.prototype.show = function() {
    this.holder.fadeIn();
}
Timer.prototype.hide = function() {
    this.holder.fadeOut();
}
Timer.prototype.setMode = function(mode) {
    switch(mode) {
	case 0: this.iconHolder.removeClass().addClass("wait icon green");
		this.state = 0;
		break;
	case 1: this.iconHolder.removeClass().addClass("wait icon yellow");
		this.state = 1;
		break;
	case 2: this.iconHolder.removeClass().addClass("wait icon red");
		this.state = 2;
		break;
	default: break;
    }
}
Timer.prototype.renderTime = function() {
    if (this.valueHolder) {
	var secondsLeft = ((this.targetTime.getTime() - this.currentTime.getTime())/1000) % 86400;
	if (secondsLeft <= 1) {
	    this.stop();
	    if (typeof this.onTimerOut == "function") {
		this.onTimerOut();
	    }
	}

	if (this.state === 0 && secondsLeft*1000 <= this.interval*0.5) {
	    this.setMode(1);
	} else if (this.state === 1 && secondsLeft*1000 <= this.interval*0.2) {
	    this.setMode(2);
	}
	//var hours = this.targetTime.getHours() - this.currentTime.getHours();
	var hours = parseInt(secondsLeft / 3600);
	if (hours < 10) hours = '0' + hours;
	secondsLeft = secondsLeft % 3600;
	
	//var min = this.targetTime.getMinutes() - this.currentTime.getMinutes();
	var min = parseInt(secondsLeft / 60);
	if (min < 10) min = '0' + min;
	
	//var sec = (this.targetTime.getTime() - this.currentTime.getTime())/1000;
	var sec = parseInt(secondsLeft % 60);
	if (sec < 10) sec = '0' + sec;
	
	var output = this.template.replace('h', hours).replace('m', min).replace('s', sec);
	this.valueHolder.html(output);
	this.currentTime = new Date();
    }
}

QLTY.core.test = function(undefined){
    var testId = undefined;
    
  
    var Test = function (){
	if (Test.prototype._TestInstance){
	    return Test.prototype._TestInstance;
	}
	Test.prototype._TestInstance = this;
		
	this.mode =  QLTY.config.core.MODE_I;
	this.switcher = new Switcher();
	this.timer;
	this.id;
	this.nTasks;
	this.mark;
	this.penalties;
	this.el;
	this.answers;
	this.state = 0; //1 - running, 0 - finished
	this.start = function(){
	    this.state = 1;
	    this.reset();
	    QLTY.ui.notifier.show("Время пошло!");
	    this.timer.start();
	    this.timer.show();

	    if (!QLTY.ui.tabs.state.is_blocked){
		QLTY.ui.tabs.block_tabs("[data-qlty-text=actualization]");
		QLTY.ui.tabs.block_tabs("[data-qlty-text=solution]");
		QLTY.ui.tabs.block_tabs("[data-qlty-text=attention]");
		QLTY.ui.tabs.state.is_blocked = true;
	    }
	}

	this.end = function(notToCheckTest){ // check if needed
	    QLTY.ui.modal.removeAllModals();
	    QLTY.ui.notifier.removeAllNotifications();
	    this.timer.reset();
	    this.timer.hide();
	    this.state = 0;
	    if (!notToCheckTest) {
		this.check();
	    }
	    
	}

	this.collectAnswers = function(){
	    var options = [];
	    var that = this;
	    var answersEls = $(".answer-wrapper");

	    answersEls.each(function(){
		var el = $(this);
		var taskOptions = [];
		el.find("input").each(function(){
		    var el = $(this);
		    taskOptions.push({
			optionId: el.attr("data-qlty-option"),
			answer: (el.attr("type") === "text") ? el.val() : el.is(":checked")
		    });
		});

		that.answers.push({
		    taskId: el.attr("data-qlty-task"),
		    options: taskOptions
		});

	    });

	    return {testId: this.id, answers: this.answers, penalties: this.penalties, mode: this.mode};
	}
	
	this.changeMode = function(mode) {
	    var self = this;
	    if (this.mode === QLTY.config.core.MODE_I && mode === QLTY.config.core.MODE_K) {
            this.start();
            this.mode = QLTY.config.core.MODE_K;
	    } else if (this.mode === QLTY.config.core.MODE_K && mode === QLTY.config.core.MODE_I) {
		QLTY.ui.notifier.removeAllNotifications();
		if (this.state === 1){
		    var modal = QLTY.ui.modal.create_modal({
			id: "test-change-mode-modal",
			title: "Смена режима",
			html: "",
			className: "qlty-modal-small",
			buttons: [
			    {
				value: "Отмена",
				id: "qlty-change-mode-ok",
				class: "ui button green",
				action: function(slf){
				    slf.close();
				    //self.switcher.slideRight();
				    self.switcher.state = 1;
				}
			    },
			    {
				value: "Перейти",
				id: "qlty-change-mode-cancel",
				class: "ui button green",
				action: function(slf){
				    slf.close();
				    //self.reset();
				    self.end(true);//do not check test
				    self.mode = QLTY.config.core.MODE_I;
				    
				    if (QLTY.ui.tabs.state.is_blocked){
                        QLTY.ui.tabs.release_tabs("[data-qlty-text=actualization]");
                        QLTY.ui.tabs.release_tabs("[data-qlty-text=solution]");
                        QLTY.ui.tabs.release_tabs("[data-qlty-text=attention]");
                        QLTY.ui.tabs.state.is_blocked = false;
				    }
				}
			    }
			]
		    });
		    modal.body(QLTY.config.modal.CHANGE_MODE);
		    modal.open();
		} else {
		    if (this.mode === QLTY.config.core.MODE_K){
                if (QLTY.ui.tabs.state.is_blocked){
                    QLTY.ui.tabs.release_tabs("[data-qlty-text=actualization]");
                    QLTY.ui.tabs.release_tabs("[data-qlty-text=solution]");
                    QLTY.ui.tabs.release_tabs("[data-qlty-text=attention]");
                    QLTY.ui.tabs.state.is_blocked = false;
                }
		    }
		    this.reset();
		    this.mode = QLTY.config.core.MODE_I;
		}
	    }
	}

	this.check = function() {
	    var self = this;
	    var modal = QLTY.ui.modal.create_modal({
		id: "check-test-modal",
		title: "Результаты тестирования",
		html: "1",
		className: "ui modal",
		onClose: function() {
		    self.switcher.setOff();
		    self.reset();
		},
		buttons: [
		    {
			value: "OK",
			id: "qlty-check-test-ok",
			class: "ui button green",
			action: function(slf){
			    slf.close();
			    //self.switcher.setOff();
			}
		    }
		]
	    });

	    modal.body(QLTY.ui.messager.createMessage(QLTY.config.modal.WAIT_MESSAGE_TEXT));
	    modal.open();
	    $.ajax({
		type: "POST",
		url: "/tests/check",
		data: self.collectAnswers(),
		success: function(response) {
		    modal.body(response);
			MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
		}
	    });
	}
	
	this.countTasks = function() {
	    return $(".qtest").find("[data-qlty-task]").length / 2;
	}
	
	this.getMark = function() {
	    return this.mark;
	}
	
	this.setMark = function(mark) {
	    this.mark = mark;
	}
	
	this.setPenalty = function(taskId) {
	    QLTY.ui.notifier.show("Штраф за подсказку 0,5 балла");
	    this.penalties.push(taskId);
	}
	
	this.disableTaskOptions = function(taskId) {
	    $(".answer-wrapper[data-qlty-task=" + taskId +"] input").attr("disabled", true);
	}
	
	this.enableTasksOptions = function() {
	    $(".answer-wrapper input").attr("disabled", false);
	}
	this.clearText = function() {
	    QLTY.ui.tabs.setCurrentTab("[data-qlty-text='main']");
	}
	
	this.clearPenalties = function() {
	    this.penalties = [];
	    $(".tab-set [data-qlty-text='actualization']").attr("data-qlty-viewed", "0");
	}
	this.reset = function(){
	    $("input:checkbox").removeAttr("checked");
	    $("input:radio").removeAttr("checked");
	    $("input:text").val("");
	    this.answers = [];
	    this.enableTasksOptions();
	    this.clearPenalties();
	    QLTY.ui.tabs.disableTabs([
            "[data-qlty-text='solution']",
            "[data-qlty-text='attention']"
	    ]);
	    QLTY.ui.tabs.activateTabs(["[data-qlty-text='main']"]);
	    QLTY.ui.tabs.setCurrentTab("[data-qlty-text='main']");
	    QLTY.ui.tabs.deactivateTabs(["[data-qlty-text='actualization']"]);
	}
	
	this.init = function(){
	    this.reset();
	    var self = this;
	    this.switcher.setOff();
	    this.el = $(document.getElementById("particular-test"));
	    this.id = this.el.attr("data-qlty-test");
	    this.answers = [];
	    this.nTasks = this.countTasks();
	    this.mark = this.nTasks;
	    this.penalties = [];
        this.timer = new Timer({
            holder: "timer-holder",
            interval: this.nTasks*360*1000,
            onTimerOut: function() {
            }
        });
	    
	    $(".answer-wrapper").on("change", function(e) {
            var target = $(e.target),
                targetType = target.attr("type"),
                taskId = $(this).attr("data-qlty-task");
            if (targetType === "checkbox" || targetType === "radio" || targetType === "text") {
                QLTY.ui.tabs.enableTabs([
                "#task-" + taskId + " [data-qlty-text='attention']",
                "#task-" + taskId + " [data-qlty-text='solution']"
                ]);
            }
	    });
	    
	    this.switcher.onOn = function(){
		    self.changeMode(QLTY.config.core.MODE_K);
	    }
	    
	    this.switcher.onOff = function(){
            self.changeMode(QLTY.config.core.MODE_I);
	    }
	    
	    this.timer.onTimerOut = function() {
		self.end(true); //not to check, we check in dialog
		var modal = QLTY.ui.modal.create_modal({
			id: "test-completed-modal",
			title: "Тест завершен",
			html: "<p class='modal-dialogue'><span class='main'>Время теста подошло к концу!</span>Нажмите кнопку проверить для получения результатов.</p>",
			className: "qlty-modal-small",
			onClose: function(){
			    self.switcher.setOff();
			},
			buttons: [
			    {
				value: "Проверить тест",
				id: "qlty-check-test",
				action: function(slf){
				    slf.close(true);
				    self.check();
				}
			    }
			]
		    });
		modal.open();
	    }
	}
	//this.init();
    }
    
    return {
	getCurrentTest: function(){
	    return new Test();
	}
    }
}();
