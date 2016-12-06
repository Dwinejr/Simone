/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name : ajax functions 
*/

jQuery(window).load(function(){

	if( jQuery('.item-list-main').length > 0 ){
		jQuery('.item-list-main').masonry('reload');
	}
	if(jQuery('.search-content').length > 0 ){
		jQuery('.search-content').masonry('reload');
	}
});


jQuery(document).ready(function($) {
	$('body').cuckoobizz('ajaxLoadMore');
});