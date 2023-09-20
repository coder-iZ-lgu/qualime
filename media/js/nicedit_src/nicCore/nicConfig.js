/* START CONFIG */
var nicEditorConfig = bkClass.extend({
	buttons : {
		'bold' : {name : __('Click to Bold'), command : 'Bold', tags : ['B','STRONG'], css : {'font-weight' : 'bold'}, key : 'b'},
		'italic' : {name : __('Click to Italic'), command : 'Italic', tags : ['EM','I'], css : {'font-style' : 'italic'}, key : 'i'},
		'underline' : {name : __('Click to Underline'), command : 'Underline', tags : ['U'], css : {'text-decoration' : 'underline'}, key : 'u'},
		'left' : {name : __('Left Align'), command : 'justifyleft', noActive : true},
		'center' : {name : __('Center Align'), command : 'justifycenter', noActive : true},
		'right' : {name : __('Right Align'), command : 'justifyright', noActive : true},
		'justify' : {name : __('Justify Align'), command : 'justifyfull', noActive : true},
		'ol' : {name : __('Insert Ordered List'), command : 'insertorderedlist', tags : ['OL']},
		'ul' : 	{name : __('Insert Unordered List'), command : 'insertunorderedlist', tags : ['UL']},
		'subscript' : {name : __('Click to Subscript'), command : 'subscript', tags : ['SUB']},
		'superscript' : {name : __('Click to Superscript'), command : 'superscript', tags : ['SUP']},
		'strikethrough' : {name : __('Click to Strike Through'), command : 'strikeThrough', css : {'text-decoration' : 'line-through'}},
		'removeformat' : {name : __('Remove Formatting'), command : 'removeformat', noActive : true},
		'indent' : {name : __('Indent Text'), command : 'indent', noActive : true},
		'outdent' : {name : __('Remove Indent'), command : 'outdent', noActive : true},
		'hr' : {name : __('Horizontal Rule'), command : 'insertHorizontalRule', noActive : true}
	},
	iconsPath : /* NICEDIT_ICONSPATH_START */'nicEditorIcons.gif'/* NICEDIT_ICONSPATH_END */,
	buttonList : ['save','bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','image','upload','link','unlink','forecolor','bgcolor'],
	iconList : /* NICEDIT_ICONLIST_START */{}/* NICEDIT_ICONLIST_END */
	/* NICEDIT_REMOVE_START */,

/*/media/js/nicedit_src/nicCore/icons/*/
	iconFiles : {'bold' : '/media/js/nicedit_src/nicCore/icons/bold.gif', 'italic' : '/media/js/nicedit_src/nicCore/icons/italic.gif', 'underline' : '/media/js/nicedit_src/nicCore/icons/underline.gif', 'outdent' : '/media/js/nicedit_src/nicCore/icons/outdent.gif', 'indent' : '/media/js/nicedit_src/nicCore/icons/indent.gif', 'hr' : '/media/js/nicedit_src/nicCore/icons/hr.gif', 'superscript' : '/media/js/nicedit_src/nicCore/icons/superscript.gif', 'subscript' : '/media/js/nicedit_src/nicCore/icons/subscript.gif', 'strikethrough' : '/media/js/nicedit_src/nicCore/icons/strikethrough.gif', 'ul' : '/media/js/nicedit_src/nicCore/icons/ul.gif', 'ol' : '/media/js/nicedit_src/nicCore/icons/ol.gif', 'left' : '/media/js/nicedit_src/nicCore/icons/left.gif', 'right' : '/media/js/nicedit_src/nicCore/icons/right.gif', 'center' : '/media/js/nicedit_src/nicCore/icons/center.gif', 'justify' : '/media/js/nicedit_src/nicCore/icons/justify.gif', 'save' : '/media/js/nicedit_src/nicCore/icons/save.gif', 'removeformat' : '/media/js/nicedit_src/nicCore/icons/removeformat.gif'}
	/* NICEDIT_REMOVE_END */
});
/* END CONFIG */