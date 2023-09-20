var QLTY = QLTY || {};

QLTY.createNS("QLTY.core.sections");

QLTY.core.sections = function(undefined){
    var QRSLT = {},
	    sectionsList;
    
    function _addSection(sectionAudience){
	console.log("Add section");
	var titleInput = $("#add-section-input");
	console.log(titleInput);
	var modal = QLTY.ui.modal.create_modal({
		id: "add-section-modal",
		title: "Добавление раздела",
		html: "",
		className: "qlty-modal-small",
		buttons: [
		    {
			value: "Отмена",
			id: "qlty-add-section-cancel",
            class: "red",
			action: function(slf){
			    slf.close();
			}
		    },
		    {
			value: "Добавить",
			id: "qlty-add-section-ok",
            class: "green",
			action: function(slf){
			    $.ajax({
				type: "POST",
				url: "/ajax/addsection",
				data: { title: $("#add-section-input").val(), audience_id: sectionAudience},
				success: function(response) {
				    $(response).appendTo(sectionsList).hide().fadeIn();
				    //sectionsList.append(response);
				}
			    });
			    slf.close();
			}
		    }
		]
	    });
	    modal.body(tmpl("add_section",{value: ""}));
	    modal.open();
    }
    
    function _editSection(sectionId, oldTitle, el){
	var modal = QLTY.ui.modal.create_modal({
		id: "edit-section-modal",
		title: "Редактирование раздела",
		html: "",
		className: "qlty-modal-small",
		buttons: [
		    {
			value: "Отмена",
			id: "qlty-edit-section-cancel",
            class: "red",
			action: function(slf){
			    slf.close();
			}
		    },
		    {
			value: "Сохранить",
			id: "qlty-edit-section-ok",
            class: "green",
			action: function(slf){
			    $.ajax({
				type: "POST",
				url: "/ajax/editsection/" + sectionId,
				data: { title: $("#add-section-input").val()},
				success: function(response) {
				    el.parent().fadeOut(function(){
					$(this).replaceWith(response);
				    });
				}
			    });
			    slf.close();

			}
		    }
		]
	    });
	    
	    modal.body(tmpl("add_section", {value: oldTitle}));
	    modal.open();
    }
    
    function _deleteSection(sectionId, el){
	var modal = QLTY.ui.modal.create_modal({
		id: "delete-section-modal",
		title: "Удаление раздела",
		html: "",
		className: "qlty-modal-small",
		buttons: [
		    {
			value: "Отмена",
			id: "qlty-delete-section-cancel",
            class: "red",
			action: function(slf){
			    slf.close();
			}
		    },
		    {
			value: "Удалить",
			id: "qlty-delete-section-ok",
            class: "green",
			action: function(slf){
			    $.ajax({
				type: "POST",
				url: "/ajax/deletesection/" + sectionId,
				success: function(response) {
				    el.parent().fadeOut(function(){
					$(this).remove();
				    });
				}
			    });
			    slf.close();
			}
		    }
		]
	    });
	    modal.body("<div class='small-modal-wrapper'><h5>Действительно удалить раздел?</h5></div>");
	    modal.open();
    }
    QRSLT.init = function(){
	console.log("init sections");
	sectionsList= $(document.getElementById('sections-list'));

	$(document).on('click', '#add-section', function(e){
	    _addSection($(this).attr("data-qlty-audience"));
	});

	$(document).on('click', '.edit-section', function(e){
	    _editSection($(this).parent().attr("data-qlty-section"), $(this).parent().attr("data-qlty-title"), $(this));
	});

	$(document).on('click', '.delete-section', function(e){
	    _deleteSection($(this).parent().attr("data-qlty-section"), $(this));
	});
    }
    return QRSLT;
}();
