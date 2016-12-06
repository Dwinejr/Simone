<?php
	global $revSliderVersion;
	
	$wrapperClass = "";
	if(GlobalsRevSlider::$isNewVersion == false)
		 $wrapperClass = " oldwp";
?>

<script type="text/javascript">
	var g_uniteDirPlagin = "<?php echo self::$dir_plugin?>";
	var g_urlContent = "<?php echo UniteFunctionsWPRev::getUrlContent()?>";
	var g_urlAjaxShowImage = "<?php echo UniteBaseClassRev::$url_ajax_showimage?>";
	var g_urlAjaxActions = "<?php echo UniteBaseClassRev::$url_ajax_actions?>";
	var g_settingsObj = {};
	
</script>

<div id="div_debug"></div>

<div class='unite_error_message' id="error_message" style="display:none;"></div>

<div class='unite_success_message' id="success_message" style="display:none;"></div>

<div id="viewWrapper" class="view_wrapper<?php echo $wrapperClass?>">

<?php
	self::requireView($view);
	
?>

</div>

<div id="divColorPicker" style="display:none;"></div>

<?php self::requireView("system/video_dialog")?>
<?php self::requireView("system/update_dialog")?>
<?php self::requireView("system/general_settings_dialog")?>

<div class="tp-plugin-version">&copy; All rights reserved, <a href="http://themepunch.com" target="_blank">Themepunch</a>  ver. <?php echo $revSliderVersion?>
</div>

<?php if(GlobalsRevSlider::SHOW_DEBUG == true): ?>

	Debug Functions (for developer use only): 
	<br><br>
	
	<a id="button_update_text" class="button-primary" href="javascript:void(0)">Update Text</a>
	
<?php endif?>
<div class="info_slider_not_update_cuckoo" style="display:block; margin-right:15px;">IMPORTANT! FOR CUCKOOTHEMES CUSTOMERS WHO'VE PURCHASED REVOLUTION SLIDER WITH THE THEME.<br />We do not update Revolution slider at once when new slider update is released. We always wait for a stable and tested version of Revolution slider, because we don't want you to have any issues with it. At the moment slider is fully functional and works without any issues. Do not try update Revolution slider yourself because slider files should be integrated within the theme, it won't work if you simply overwrite existing slider files. Please be patient and when stable version will be confirmed - we'll update it immediately.</div>	

