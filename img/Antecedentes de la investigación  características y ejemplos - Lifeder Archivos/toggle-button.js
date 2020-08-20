jQuery(document).ready(function(){
    /**
    * Toggle Shortcode
    */
    jQuery('h3.toggle-head').on('click', function(){
    	var $thisElement = jQuery(this).parent();
    	$thisElement.find('div.toggle-content').slideToggle();
    	$thisElement.toggleClass('tie-sc-open tie-sc-close');
    });
});