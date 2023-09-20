(function(){
  var cache = {};
 
  this.tmpl = function tmpl(str, data){
    // Выяснить, мы получаем шаблон или нам нужно его загрузить
    // обязательно закешировать результат
    var fn = !/\W/.test(str) ?
      cache[str] = cache[str] ||
        tmpl(document.getElementById(str).innerHTML) :
     
      // Сгенерировать (и закешировать) функцию, 
      // которая будет служить генератором шаблонов
      new Function("obj",
        "var p=[],print=function(){p.push.apply(p,arguments);};" +
       
        // Сделать данные доступными локально при помощи with(){}
        "with(obj){p.push('" +
       
        // Превратить шаблон в чистый JavaScript
        str
          .replace(/[\r\t\n]/g, " ")
          .split("<%").join("\t")
          .replace(/((^|%>)[^\t]*)'/g, "$1\r")
          .replace(/\t=(.*?)%>/g, "',$1,'")
          .split("\t").join("');")
          .split("%>").join("p.push('")
          .split("\r").join("\\'")
      + "');}return p.join('');");
   
    // простейший карринг(термин функ. прог. - прим. пер.)
    // для пользователя
    return data ? fn( data ) : fn;
  };
})();


var QLTY = QLTY || {};

QLTY.config = {
    ui: {
	MODAL_TEMPLATE: "item_tmpl",
	TABS_TEMPLATE: "tabs_template",
	OPTION_TEMPLATE: "option_template",
	MAIN_TEXT_EDITOR: "main-text-editor",
	ACTUALIZATION_TEXT_EDITOR: "actualization-text-editor",
	SOLUTION_TEXT_EDITOR: "solution-text-editor",
	ATTENTION_TEXT_EDITOR: "attention-text-editor",
    },
    modal: {
	CHANGE_TASK_TEXT: "<p class='modal-dialogue'>При выборе данного типа задание все варианты ответов кроме первого в списке бедут удалены. Продолжить?</p>",
	DELETE_TASK_TEXT: "<p class='modal-dialogue'>Действительно удалить задание?</p>",
	CHANGE_MODE: "<p class='modal-dialogue'>Действительно вернуться в интерактивный режим? Все ответы будут обнуленыю</p>",
	WAIT_MESSAGE_TEXT: "<p class='modal-dialogue'>Подождите, идет загрузка.</p>"
    },
    core: {
	MODE_I: true,
	MODE_K: false,
	TEST_TIME: 15
    }
};












$(function() {
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 100) {
            $(document.getElementById("test-info-bar")).addClass("particular-test-header-fixed");
        } else {
            $(document.getElementById("test-info-bar")).removeClass("particular-test-header-fixed");
        }
    });
    //var s = new Switcher();
    /*
    var t = new Timer({
	holder: "timer-time",
	interval: 10*1000,
	onTimerOut: function() {
	    console.log("OUT");
	}
    });
    t.start();
    */
    var test = QLTY.tests.getCurrentTest();
    test.init();
    test.countTasks();
    QLTY.tabs.init();
    QLTY.sections.init();
    /*
    $("#block-button").click(function(){
	if (!QLTY.tabs.state.is_blocked){
	    console.log("blocking");
	    QLTY.tabs.block_tabs("[data-qlty-text=actualization]");
	    QLTY.tabs.block_tabs("[data-qlty-text=solution]");
	    QLTY.tabs.block_tabs("[data-qlty-text=attention]");
	    QLTY.tabs.state.is_blocked = true;
	}
    });
    $("#release-button").click(function(){
	if (QLTY.tabs.state.is_blocked){
	    console.log("releasing");
	    QLTY.tabs.release_tabs("[data-qlty-text=actualization]");
	    QLTY.tabs.release_tabs("[data-qlty-text=solution]");
	    QLTY.tabs.release_tabs("[data-qlty-text=attention]");
	    QLTY.tabs.state.is_blocked = false;
	}
    });
    */
    $("#check-button").click(function(){
	    var test = QLTY.tests.getCurrentTest();
	    test.end();
	});

    QLTY.edit_toolbar.init();
    QLTY.ui.sectionsToggler.init();
});