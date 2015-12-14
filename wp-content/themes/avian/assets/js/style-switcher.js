// Style Switcher
//=======================================
jQuery(document).ready(function() {
	jQuery('ul#navigation li span,#panel',jQuery(this)).stop().animate({'marginLeft':'145px'},200);
	jQuery('#navigation > li ').toggle(function() {
		jQuery('span,#panel',jQuery(this)).stop().animate({'marginLeft':'0px'},200);
	},function(){
		jQuery('span,#panel',jQuery(this)).stop().animate({'marginLeft':'145px'},200);
	});
});

jQuery('#style-ultralight').click(function() {

	var themepath = jQuery('.style-switcher-container').attr('data-theme-path');
	jQuery('#dark-css').remove();
	jQuery('#dark-css').remove();
	jQuery('#dark-css').remove();
	jQuery('head').append('<link id="ultra-light-css" rel="stylesheet" href="'+themepath+'/css/ultra-light.css" type="text/css" />');
});
jQuery('#style-dark').click(function() {

	var themepath = jQuery('.style-switcher-container').attr('data-theme-path');
	jQuery('#ultra-light-css').remove();
	jQuery('#ultra-light-css').remove();
	jQuery('#ultra-light-css').remove();
	jQuery('head').append('<link id="dark-css" rel="stylesheet" href="'+themepath+'/css/dark.css" type="text/css" />');
});
jQuery('#style-light').click(function() {

	var themepath = jQuery('.style-switcher-container').attr('data-theme-path');
	jQuery('#ultra-light-css').remove();
	jQuery('#dark-css').remove();
	jQuery('#ultra-light-css').remove();
	jQuery('#dark-css').remove();
	jQuery('#ultra-light-css').remove();
	jQuery('#dark-css').remove();
});