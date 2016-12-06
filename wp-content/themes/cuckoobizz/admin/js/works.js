/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/
 
 /* insert images to gallery */
jQuery(document).ready(function() {
jQuery('.upload_button').click(function() {
var ids = jQuery(this).attr('id').replace(/cuckoo_upload_image/, '');
tb_show('', 'media-upload.php?type=image&TB_iframe=true');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
jQuery('.cuckoo_upload_image'+ids).css({color:"black"});;
jQuery('.cuckoo_upload_image'+ids).val(imgurl);
tb_remove();
}
return false;
});
});

/* images not insert settings */

jQuery(document).ready(function($) {
$(".uploud_images_works").each(function(){
	var id = $(this).attr('id').replace(/cuckoo_upload_text/, '');
	var a = $("#cuckoo_upload_text"+id).find(":input[type=text].uploud_work_text").val();
	var b = $("#cuckoo_upload_text"+id).find(":input[type=text].cuckoo_upload_image"+id).val();
	var title = "Add Title";
	var image = "Image URL";
	if( a.length == 0 || a == title ) {
		$("#cuckoo_upload_text"+id+" :input[type=text].uploud_work_text").attr("value", title).css({color:"#999999"});
	}	
	if( b.length == 0 || b == image) {
		$("#cuckoo_upload_text"+id+" :input[type=text].cuckoo_upload_image"+id).attr("value", image).css({color:"#999999"});
	}
$("#cuckoo_upload_text"+id+" :input[type=text].uploud_work_text").each(function() {
    $(this).focus(function() {
        if(this.value == title) {
            this.value = '',
			$(this).css({color:"black"});
        }
    });
    $(this).blur(function() {
        if(this.value == '') {
            this.value = title,
			$(this).css({color:"#999999"});
        }
    });
});
$("#cuckoo_upload_text"+id+" :input[type=text].cuckoo_upload_image"+id).each(function() {
    $(this).focus(function() {
        if(this.value == image) {
            this.value = '',
			$(this).css({color:"black"});
        }
    });
    $(this).blur(function() {
        if(this.value == '') {
            this.value = image,
			$(this).css({color:"#999999"});
        }
    });
});
});
});


function get_upload(){
jQuery('.widget_uploud_images').live( 'click', function() {
var ids = jQuery(this).attr('id').replace(/widgest_upload/, '');
tb_show('', 'media-upload.php?type=image&TB_iframe=1');
window.send_to_editor = function(html) {
if (jQuery(html).is("a")) {
var imgurl = jQuery('img', html).attr('src');
} else if (jQuery(html).is("img")) {
var imgurl = jQuery(html).attr('src');
}
jQuery('.widgest_upload'+ids).val(imgurl);
tb_remove();
}
return false;
});
}


jQuery(document).ready(function() {
	/*
	get_upload();
	jQuery('.upload_button_testimonials').click(function() {
		tb_show('', 'media-upload.php?type=image&TB_iframe=true');
		window.send_to_editor = function(html) {
		if (jQuery(html).is("a")) {
		var imgurl = jQuery('img', html).attr('src');
		} else if (jQuery(html).is("img")) {
		var imgurl = jQuery(html).attr('src');
		}
		jQuery('.upload_input').val(imgurl);
		tb_remove();
		}
		return false;
	});
	*/
	jQuery(".remove_block_testimonial").click(function(){
	
		if(confirm("You are about to delete testimonial image and all elements?\nClick 'Cancel' to stop, 'OK' to continue.")){
			jQuery('.title-element').each(function(){
				jQuery(this).attr('value', '');
			});
			alert("Delete Image Elements!");
		}
	});
});

jQuery(document).ready(function($){
$('.upload_button_new.button-admin').click(function(e) {
    e.preventDefault();
	var button = $(this);
	var id = button.attr('id').replace('uploadId', '');

    var custom_uploader = wp.media({
        title: 'Insert Media',
        button: {
            text: 'Insert image',
        },
        multiple: false  // Set this to true to allow multiple files to be selected
    })
    .on('select', function() {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        $("#image_url_input"+id).val(attachment.url).css('color', 'black');
    })
    .open();
});
});