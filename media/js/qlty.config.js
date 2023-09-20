var QLTY = QLTY || {};
QLTY.createNS("QLTY.config");


QLTY.config = {
	ui: {
		MODAL_TEMPLATE: "item_tmpl",
		TABS_TEMPLATE: "tabs_template",
		OPTION_TEMPLATE: "option_template",
		MAIN_TEXT_EDITOR: "main-text-editor",
		ACTUALIZATION_TEXT_EDITOR: "actualization-text-editor",
		SOLUTION_TEXT_EDITOR: "solution-text-editor",
		ATTENTION_TEXT_EDITOR: "attention-text-editor",

		SOLUTION_INPUT: "solution-input"

	},
	modal: {
		CHANGE_TASK_TEXT: "<p class='modal-dialogue'>При выборе данного типа задание все варианты ответов кроме первого в списке бедут удалены. Продолжить?</p>",
		DELETE_TASK_TEXT: "<p class='modal-dialogue'>Действительно удалить задание?</p>",
		CHANGE_MODE: "<p class='modal-dialogue'>Действительно вернуться в интерактивный режим? Все ответы будут обнулены.</p>",
		WAIT_MESSAGE_TEXT: "<p class='modal-dialogue'>Подождите, идет загрузка.</p>"
	},
	core: {
		MODE_I: true,
		MODE_K: false,
		TEST_TIME: 15
	}
};
