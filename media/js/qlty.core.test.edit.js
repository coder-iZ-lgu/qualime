var QLTY = QLTY || {};
QLTY.createNS("QLTY.core.test.edit");

QLTY.core.test.edit = {
    init : function(){
	/*events*/
	/*view task*/
	
	$('#audience-type-select').on('change', function(){
	    var el = $(this),
		sections = $('#section-select'),
		sectionsSelected = $('.sections-hidden[data-qlty-audience='+el.val()+']');
	    sections.empty();
	    sections.append(sectionsSelected.children().clone());
	    console.log(el.val());
	});
	
	$(".task-view").click(function(){
	    var el = $(this),
		taskId = el.attr("data-qlty-task");
	    
	    var modal = QLTY.ui.modal.create_modal({
		id: "view-task-modal-" + taskId,
		title: "Просмотр задания",
		html: taskId,
		buttons: [
		    {
			value: "OK",
			id: "qlty-ok",
			class: "ui button green",
			action: function(self){
			    self.close();
			}
		    }
		]
	    });
	    modal.body(QLTY.ui.messager.createMessage(QLTY.config.modal.WAIT_MESSAGE_TEXT));
	    modal.open();
	    $.ajax({ // описываем наш запрос
		type: "GET", // будем передавать данные через POST
		url: "/tasks/task/" + taskId, // запрос отправляем на контроллер Ajax метод addarticle
		success: function(response) { // когда получаем ответ
		    modal.body(response);
		    //QLTY.tabs.init();
		    QLTY.ui.tabs.init();
		}
	    });
	});
	    /*edit task*/
	$(".task-edit").click(function(){
	    var el = $(this),
		taskId = el.attr("data-qlty-task");
	    var modalButtons = [
		    {
			value: "Сохранить",
			id: "qlty-save",
			class: "ui button green",
			action: function(self){
			    console.log("Saving...");
			    $.ajax({
			    type: "POST",
			    data: QLTY.ui.taskEditor.collect_data_to_send(),
			    url: "/ajax/task/" + taskId,
			    dataType: "json",
			    success: function(data) {
				self.close();
			    },
			    error: function(e){
				console.log("EROOR");
			    }
			  });
			}
		    },
		    {
			value: "Отмена",
			id: "qlty-cancel",
			class: "ui button red",
			action: function(self){
			    self.close();
			    console.log(this);
			}
		    }
		];
		
	    var modal = QLTY.ui.modal.create_modal({
		id: "edit-task-modal-" + taskId,
		title: "Редактирование задания",
		html: taskId,
		buttons: modalButtons
	    });
	    modal.open();
	    modal.body(QLTY.ui.messager.createMessage(QLTY.config.modal.WAIT_MESSAGE_TEXT));
	    $.ajax({
		type: "GET",
		url: "/ajax/task/" + taskId,
		dataType: 'json',
		success: function(response) {
		    modal.body(tmpl(QLTY.config.ui.TABS_TEMPLATE, {
			task: response.task,
			options: response.options || {},
			task_types: response.task_types
		    }));
		    QLTY.ui.taskEditor.init();
		    QLTY.ui.taskEditor.currentTaskType(response.task.type);

		}
	    });
	});
		    /*add task*/
	$(".task-add").click(function(){
	    var el = $(this),
		taskId = 0; //adding task
	    var modalButtons = [
		    {
			value: "Отмена",
			id: "qlty-cancel",
			action: function(self){
			    self.close();
			    console.log(this);
			}
		    },
		    {
			value: "Добавить",
			id: "qlty-add",
			action: function(self){
			    console.log("Saving...");
			    $.ajax({
			    type: "POST",
			    data: QLTY.ui.taskEditor.collect_data_to_send(),
			    url: "/ajax/task/" + taskId,
			    dataType: "json",
			    success: function(data) {
				self.close();
			    },
			    error: function(e){
				console.log("EROOR");
			    }
			  });
			}
		    },
		];
		
	    var modal = QLTY.ui.modal.create_modal({
		id: "add-task-modal-" + taskId,
		title: "Добавление задания",
		html: taskId,
		buttons: modalButtons
	    });
	    
	    modal.open();
	    modal.body(QLTY.ui.messager.createMessage(QLTY.config.modal.WAIT_MESSAGE_TEXT));
	    $.ajax({
		type: "GET",
		url: "/ajax/tasktypes",
		dataType: 'json',
		success: function(response) {
		    modal.body(tmpl(QLTY.config.ui.TABS_TEMPLATE, {
			task: {
			    main_text: "",
			    actualization_text: "",
			    solution_text: "",
			    attention_text: "",
			},
			options: {},
			task_types: response
		    }));
		    QLTY.ui.taskEditor.init();
		    QLTY.ui.taskEditor.currentTaskType(1);		    

		}
	    });
	    
	});
	
		    /*delete task*/
	$(".task-delete").click(function(){
	    var el = $(this),
		taskId = el.attr("data-qlty-task");
	    var modalButtons = [
		    {
			value: "Отмена",
			class: "dark",
			id: "qlty-cancel-" + taskId,
			action: function(self){
			    self.close();
			}
		    },
		    {
			value: "Удалить",
			class: "ui button red",
			id: "qlty-delete-"+taskId,
			action: function(self){
			    modal.body(QLTY.ui.messager.createMessage(QLTY.config.modal.WAIT_MESSAGE_TEXT));
			    console.log("Deleting...");
			    $.ajax({
			    type: "POST",
			    url: "/ajax/deletetask/" + taskId,
			    success: function(data) {
				self.close();
				$(document.getElementById("task-edit-item-" + taskId)).fadeOut('slow', function(){
				    $(this).remove();
				});
				QLTY.ui.notifier.show("Задание удалено.");
			    },
			    error: function(e){
				console.log("ERROR");
			    }
			  });
			}
		    },
		];
		
	    var modal = QLTY.ui.modal.create_modal({
		id: "delete-task-modal-" + taskId,
		title: "Удаление задания",
		html: taskId,
		className: "qlty-modal-small",
		buttons: modalButtons
	    });
	    modal.body(QLTY.config.modal.DELETE_TASK_TEXT);
	    modal.open();
	});
    }
};
