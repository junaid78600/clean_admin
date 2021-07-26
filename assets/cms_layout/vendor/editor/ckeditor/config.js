/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */
 
 CKEDITOR.on( 'instanceReady', function( ev )
   {
      ev.editor.dataProcessor.writer.setRules( 'p',
         {
            indent : false,
            breakBeforeOpen : false,
            breakAfterOpen : false,
            breakBeforeClose : false,
            breakAfterClose : false
         });
   });
 
	CKEDITOR.editorConfig = function( config ) {

//config.enterMode = CKEDITOR.ENTER_BR;
config.allowedContent = true;
config.forcePasteAsPlainText = true;
config.pasteFromWordRemoveFontStyles = true;
config.pasteFromWordRemoveStyles = true;
 config.contentsLanguage = 'ur';
	config.filebrowserBrowseUrl = '../assets/cms_layout/vendor/editor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl = '../assets/cms_layout/vendor/editor/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '../assets/cms_layout/vendor/editor/ckfinder/ckfinder.html?type=Flash';
config.filebrowserUploadUrl = '../assets/cms_layout/vendor/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '../assets/cms_layout/vendor/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '../assets/cms_layout/vendor/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
   config.language_list = [ 'he:Hebrew:rtl', 'pt:Portuguese', 'de:German', 'es:Spanish', 'ur:Urdu:rtl' ];
  
  config.toolbar = [
 	 { name: 'insert', items: [ 'Image', 'Table', 'Iframe' ] },
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source'] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste'] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Scayt' ] },
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline'] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
	
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize'] },
	{ name: 'others', items: [ '-' ] }
]; 
};
// { name: 'insert', items: [ 'Image', 'Table', 'Iframe' ] },