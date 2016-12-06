/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
*************
*/
jQuery(document).ready(function($) {
	var firstElent = $('ul#adminmenu').find('li#menu-posts-works');
	firstElent.before('<li class="wp-not-current-submenu wp-menu-separator"><div class="separator"></div></li>');
	
		// Multiple portfolio in Pages settings
	$('.show-types-multiple-use').each(function(){
		if( $(this).attr('checked') == 'checked' ){
			$('#portfolio-types').css('display', 'block');
		}
	});
	
	$('.show-types-multiple-use').on('click', function(){
		if( $(this).attr('checked') == 'checked' ){
			$('#portfolio-types').slideDown();
		}else{
			$('#portfolio-types').slideUp();
		}
	});
	
	$("#page_template").each(function(){
		var option = $("option:selected", this).val();
		if(option == "template-filter-480.php"){
			$("#cuckoo-multiple-settings-hide").attr('checked', true);
			$("#cuckoo-multiple-settings").css('display', 'block');
		}else if(option == "template-filter-225.php"){
			$("#cuckoo-multiple-settings-hide").attr('checked', true);
			$("#cuckoo-multiple-settings").css('display', 'block');
		} else {
			$("#cuckoo-multiple-settings-hide").attr('checked', false);
			$("#cuckoo-multiple-settings").css('display', 'none');
		}
	});
	
	$("#page_template").change(function(event){
		$("option:selected", $(this)).each(function(){
			var option = document.getElementById('page_template').value;
			if(option == "template-filter-480.php"){
				$("#cuckoo-multiple-settings-hide").attr('checked', true);
				$("#cuckoo-multiple-settings").slideDown();
			}else if(option == "template-filter-225.php"){
				$("#cuckoo-multiple-settings-hide").attr('checked', true);
				$("#cuckoo-multiple-settings").slideDown();
			} else {
				$("#cuckoo-multiple-settings-hide").attr('checked', false);
				$("#cuckoo-multiple-settings").slideUp();
			}
		});
	});
	
	$('.multiple-types').on('click', function(){
		var a = $(this), type, allTypes,
			mainParent = a.closest('#portfolio-types'),
			buttonAll = mainParent.find('input.multiple-types-all'),
			hidden = mainParent.find(':input[type=hidden][name=portfolio-types]');
			allInputs = mainParent.find('.multiple-types').length;
			allInputsChecked = mainParent.find('.multiple-types:checked').length;
			
		if( a.attr('checked') == 'checked' ){
			if( allInputs == allInputsChecked ){
				buttonAll.attr('checked', true);
			}
			allTypes = hidden.val();
			type = a.val()+',';
			hidden.attr('value', allTypes+type);
		}else{
			if( allInputs != allInputsChecked ){
				buttonAll.attr('checked', false);
			}
			type = a.val()+',';
			allTypes = hidden.val().replace(type, '');
			hidden.attr('value', allTypes);
		}
	});	
	
	$('.multiple-types-all').on('click', function(){
		var a = $(this), type, allTypes,
			mainParent = a.closest('#portfolio-types'),
			hidden = mainParent.find(':input[type=hidden][name=portfolio-types]');
			
		if( a.attr('checked') == 'checked' ){
			
			$('.multiple-types').each(function(){
				$(this).attr('checked', true);
				allTypes = hidden.val();
				type = $(this).val()+',';
				hidden.attr('value', allTypes+type);
			});
			
		}else{
		
			$('.multiple-types').each(function(){
				$(this).attr('checked', false);
				hidden.attr('value', '');
			});
			
		}
	});
});