var QLTY = QLTY || {};
QLTY.createNS("QLTY.ui.taskEditor");

QLTY.ui.taskEditor = function (undefined) {
	var QRSLT = {};
	var editor = undefined,
		editorConfig = {
			buttonList: ['xhtml'],
			iconsPath: "/media/js/nicedit/nicEditorIcons.gif"
		},
		currentTaskType = undefined,
		addedOptionsCounter = 0,
		taskTypes = ["radio", "checkbox", "input"];

	function _init_editable(id) {
		if (!editor.instanceById(id)) {
			editor.panelInstance(id);
		}
	}
	function _getTabText(id) {
		var instance = editor.instanceById(id);

		console.group(id)
		console.log(document.querySelector("#id"))
		console.groupEnd()

		if (!instance) {
			return $(document.getElementById(id)).val();
		} else {
			return instance.getContent();
		}
	}

	function _getTaskOptions() {
		var options = [];
		$(document.getElementById("task-options")).find("li").each(function () {
			var el = $(this),
				textarea = $(this.getElementsByTagName("textarea")[0]),
				option = {},
				text = editor.instanceById(textarea.attr("id")).getContent();
			if (currentTaskType == "3") {
				console.log("CTT: " + currentTaskType);
				text = text.replace(/(<([^>]+)>)/ig, "");
				console.log(text);
			}
			option.text = text;
			option.is_right = el.find("input").is(":checked") ? 1 : 0;
			options.push(option);
		});
		return options;
	}

	function _getTestId() {
		return $(".test-edit-info").attr("data-qlty-test");
	}

	function _getCurrentTaskType() {
		return currentTaskType;
	}

	function _changeTaskType(type) {
		const input = $(document.getElementById("task-options")).find("input").attr("type", taskTypes[type - 1]);
		if (type === 3) {
			input.attr("id", "solution-input")
			$(document.getElementById("task-options")).find("li:gt(0)").remove();
		}
		currentTaskType = type;
	}

	QRSLT.init = function () {
		QLTY.ui.tabs.init();
		editor = editor || new nicEditor(editorConfig);
		console.log("INIT EDITOR from tastEditor");
		_init_editable(QLTY.config.ui.MAIN_TEXT_EDITOR);
		$(document.getElementById("tab-actualization"))
			.click(function () { _init_editable(QLTY.config.ui.ACTUALIZATION_TEXT_EDITOR); });
		$(document.getElementById("tab-solution"))
			.click(function () { _init_editable(QLTY.config.ui.SOLUTION_TEXT_EDITOR); });
		$(document.getElementById("tab-attention"))
			.click(function () { _init_editable(QLTY.config.ui.ATTENTION_TEXT_EDITOR); });

		currentTaskType = $(document.getElementById("task-type")).val();
		console.log("CTT" + currentTaskType);
		/*make options editable*/
		$(document.getElementById("task-options")).find("textarea").each(function () {
			var self = $(this);
			return function (ed) {
				editor.panelInstance(self.attr("id"));
			}(editor);
		});

		$(".task-option-remove").click(function () {
			$(this).parent().parent().remove();
		});

		$(".task-option-add").click(function () {
			const currentTaskType = _getCurrentTaskType()

			if (currentTaskType == 3) {
				$(document.getElementById("task-options")).append(
					tmpl(QLTY.config.ui.OPTION_TEMPLATE, { optionId: `solution-input`, id: addedOptionsCounter, type: taskTypes[currentTaskType - 1] })
				);
			}

			else {
				$(document.getElementById("task-options")).append(
					tmpl(QLTY.config.ui.OPTION_TEMPLATE, { optionId: `option-${Math.floor(Math.random() * 10000)}`, id: addedOptionsCounter, type: taskTypes[currentTaskType - 1] })
				);
			}

			editor.panelInstance("option-added-" + addedOptionsCounter);
			addedOptionsCounter++;
			//TODO: refactor
			$(".task-option-remove").unbind("click").click(function () {
				$(this).parent().parent().remove();
			});
		});
		$(document.getElementById("task-type")).focus(function () {
			currentTaskType = this.value;
		}).change(function (e) {
			var el = $(this);

			// if (el.val() === "3") {
			// 	console.log("hello !)")
			// 	var modal = QLTY.ui.modal.create_modal({
			// 	    id: "change-task-type-modal",
			// 	    title: "Поменять тип задания",
			// 	    html: QLTY.config.modal.CHANGE_TASK_TEXT,
			// 	    className: "ui modal",
			// 	    buttons: [
			// 		{
			// 		    value: "Отмена",
			// 		    id: "qlty-change-type-cancel",
			// 		    action: function(self){
			// 			el.val(currentTaskType);
			// 			self.close();
			// 		    }
			// 		},
			// 		{
			// 		    value: "OK",
			// 		    id: "qlty-change-type-ok",
			// 		    action: function(self){
			// 			_changeTaskType(+el.val());
			// 			//currentTaskType = this.value;
			// 			self.close();
			// 		    }
			// 		}
			// 	    ]
			// 	});
			// 	modal.open();
			// } else {
			currentTaskType = this.value;
			_changeTaskType(+el.val());
			// }

		});
	}
	QRSLT.get_editor = function () {
		return editor;
	}
	QRSLT.collect_data_to_send = function () {
		console.log($(QLTY.config.ui.MAIN_TEXT_EDITOR));
		console.log("CTT before collect: " + _getCurrentTaskType());
		return {
			test_id: _getTestId,
			type_id: _getCurrentTaskType(),
			main_text: _getTabText(QLTY.config.ui.MAIN_TEXT_EDITOR),
			actualization_text: _getTabText(QLTY.config.ui.ACTUALIZATION_TEXT_EDITOR),
			solution_text: _getTabText(QLTY.config.ui.SOLUTION_INPUT),
			attention_text: _getTabText(QLTY.config.ui.ATTENTION_TEXT_EDITOR),
			options: _getTaskOptions()
		};
	}
	QRSLT.currentTaskType = function (type) {
		if (!type) {
			return currentTaskType;
		} else {
			currentTaskType = type;
		}
	}

	return QRSLT;
}();