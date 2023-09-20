
    /**
    * nicExample
    * @description: An example button plugin for nicEdit
    * @requires: nicCore, nicPane, nicAdvancedButton
    * @author: Brian Kirchoff
    * @version: 0.9.0
    */
     
    /* START CONFIG */
    var nicInsertFormulaOptions = {
        buttons : {
            'insertFormula' : {name : __('Some alt text for the button'), type : 'nicEditorInsertFormulaButton'}
        }/* NICEDIT_REMOVE_START */,iconFiles : {'insertFormula' : '/media/js/nicedit_src/nicInsertFormula/icons/formula.gif'}/* NICEDIT_REMOVE_END */
    };
    /* END CONFIG */
     

    var nicEditorInsertFormulaButton = nicEditorAdvancedButton.extend({
      mouseClick : function() {
	  var that = this;
	  var lastSelected = this.ne.selectedInstance;
	  var range = this.ne.selectedInstance.getRng();
	  var selection = this.ne.selectedInstance.getSel();

	  var modal = QLTY.ui.modal.create_modal({
		id: "add-formula-modal",
		title: "Добавление формулы",
		html: "скоро будет",
		class: "qlty-modal-large",
		buttons: [
		    {
			value: "Добавить",
			id: "qlty-add-formula-ok",
			action: function(self){
			    console.log("inserting");
			    that.ne.selectedInstance = lastSelected;
			    that.ne.selectedInstance.selRng(range, selection);
			    that.ne.nicCommand('insertHTML', QLTY.ui.formulaRenderer.getFormula());
			    self.close();
			}
		    },
		    {
			value: "Отмена",
			id: "qlty-add-farmula-cancel",
			action: function(self){
			    self.close();
			}
		    },
		]
	    });
	    modal.body(tmpl("formula_add_template"));   
	    modal.open();
	    QLTY.ui.formulaRenderer.init();
	    
      }
    });
     
    nicEditors.registerPlugin(nicPlugin,nicInsertFormulaOptions);
