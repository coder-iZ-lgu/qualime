
    /**
    * nicExample
    * @description: An example button plugin for nicEdit
    * @requires: nicCore, nicPane, nicAdvancedButton
    * @author: Brian Kirchoff
    * @version: 0.9.0
    */
     
    /* START CONFIG */
    var nicInsertImageOptions = {
        buttons : {
            'insertImage' : {name : __('Some alt text for the button'), type : 'nicEditorInsertImageButton'}
        }/* NICEDIT_REMOVE_START */,iconFiles : {'insertImage' : '/media/js/nicedit_src/nicInsertImage/icons/image.gif'}/* NICEDIT_REMOVE_END */
    };
    /* END CONFIG */
     

    var nicEditorInsertImageButton = nicEditorAdvancedButton.extend({
      mouseClick : function() {
	  var that = this;
	  var lastSelected = this.ne.selectedInstance;
	  var range = this.ne.selectedInstance.getRng();
	  var selection = this.ne.selectedInstance.getSel();

	  var modal = QLTY.ui.modal.create_modal({
		id: "add-image-modal",
		title: "Добавление изображения",
		html: "adding image",
		class: "qlty-modal-medium",
		buttons: [
		    {
			value: "Добавить",
			id: "qlty-add-image-ok",
			action: function(self){
			    that.ne.selectedInstance = lastSelected;
			    that.ne.selectedInstance.selRng(range, selection);
			    that.ne.nicCommand('insertImage', QLTY.ui.imageUploader.getImageSrc());
			    self.close();
			}
		    },
		    {
			value: "Отмена",
			id: "qlty-add-image-cancel",
			action: function(self){
			    self.close();
			}
		    },
		]
	    });
	    modal.body(tmpl("image_upload_template"));
	    QLTY.ui.imageUploader.init();
	    //this.ne.selectedInstance.saveRng();
	    modal.open();
      }
    });
     
    nicEditors.registerPlugin(nicPlugin,nicInsertImageOptions);
