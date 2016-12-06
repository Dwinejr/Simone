/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
var shortEd;
var shortUrl;

(function() {
	tinymce.create('tinymce.plugins.shortcodes', {
		init : function(e, url) {
			shortEd = e;
			shortUrl = url;
		},
		createControl: function(newElement, con) {
			
			switch (newElement) {
				case 'shortcodes':
					var codes = con.createMenuButton('shortcodes', {
						title : 'Cuckoothemes Shortcodes',
						image : shortUrl+'/icon_shortcodes.png',
						icons:false
				});

				codes.onRenderMenu.add(function(codes, newSector) {
					sub = newSector.addMenu({title : 'Typography'}); /* Typography submenu */

					sub.add({title : 'Header 1', onclick : function() {
						var str = '[h1]Header 1[/h1]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});

					sub.add({title : 'Header 2', onclick : function() {
						var str = '[h2]Header 2[/h2]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});

					sub.add({title : 'Header 3', onclick : function() {
						var str = '[h3]Header 3[/h3]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Header 4', onclick : function() {
						var str = '[h4]Header 4[/h4]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
				   
					sub.add({title : 'Header 5', onclick : function() {
						var str = '[h5]Header 5[/h5]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Header 6', onclick : function() {
						var str = '[h6]Header 6[/h6]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Unordered List', onclick : function() {
						var str = '[unordered title="Title"][line]Line1[/line][line]Line2[/line][/unordered]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Ordered List', onclick : function() {
						var str = '[ordered title="Title"][line]Line1[/line][line]Line2[/line][/ordered]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Preformatted Code', onclick : function() {
						var str = '[code width="100%"]Your Code[/code]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Selected Text', onclick : function() {
						var str = '[selected]Selected Text[/selected]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Deleted text', onclick : function() {
						var str = '[deleted]Deleted Text[/deleted]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Quote', onclick : function() {
						var str = '[quote width="100%" author="Author Name"]Your Quote[/quote]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					/*newSector.addSeparator();*/
					
					newSector.add({title : 'Text Box', onclick : function() { /* Text Box content */
						var str = '[text-box title="Title" width="100%" align="center"] Your Content [/text-box]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					newSector.add({title : 'Dividing Line', onclick : function() { /* Dividing */
						var str = '[div-line]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub = newSector.addMenu({title : 'Columns'}); /* Columns submenu */
					
					sub.add({title : 'Column One Half', onclick : function() {
						var str = '[one-half title="Column One Half"]Your Content[/one-half]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Column One Third", onclick : function() {
						var str = '[one-third title="Column One Third"]Your Content[/one-third]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Column Two Third', onclick : function() {
						var str = '[two-third title="Column Two Third"]Your Content[/two-third]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Column One Fourth', onclick : function() {
						var str = '[one-fourth title="Column One Fourth"]Your content[/one-fourth]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Column Three Fourth', onclick : function() {
						var str = '[three-fourth title="Column Three Fourth"]Your content[/three-fourth]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Last Column', onclick : function() {
						var str = ' last="true"';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					newSector.add({title : 'Button', onclick : function() { /* Button */
						var str = '[btn title="Button Title" url="http://www.cuckoothemes.com" color="#4F4F4F" titlecolor="#ffffff"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});	

					newSector.add({title : 'Link With ID', onclick : function() {
						var str = '[urlwithid url="http://www.cuckoothemes.com"]Your Text[/urlwithid]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					newSector.add({title : 'CuckooLove', onclick : function() { /* CuckooLove plugin */
						var str = '[cuckoo_love]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub = newSector.addMenu({title : 'Slideshow'}); /* Slideshow submenu */
					
					sub.add({title : 'Slideshow Container', onclick : function() {
						var str = '[slide id="1"][slideimg url="Insert the image URL here"][/slide]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Slideshow Image', onclick : function() {
						var str = '[slideimg url="Insert the image URL here"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub = newSector.addMenu({title : 'Percent Bar'}); /* Percent submenu */
					
					sub.add({title : 'Percent Container', onclick : function() {
						var str = '[per-cont][per-bar title="Bar Title" percentage="100%"][/per-cont]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Percent Bar', onclick : function() {
						var str = '[per-bar title="Bar Title" percentage="100%"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub = newSector.addMenu({title : 'Pricing Table'}); /* Percent submenu */
					
					sub.add({title : 'Pricing Container', onclick : function() {
						var str = '[pri-table][pri-header title="Header Title"][pri-price price="$60"][pri-box]Your content[/pri-box][pri-link title="Link Title" url="http://www.cuckoothemes.com"][/pri-table]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Pricing Header', onclick : function() {
						var str = '[pri-header title="Header Title"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Pricing Price', onclick : function() {
						var str = '[pri-price price="$60"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Pricing Box', onclick : function() {
						var str = '[pri-box title="Box Title"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Pricing Link', onclick : function() {
						var str = '[pri-link title="Link Title" url="http://www.cuckoothemes.com"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});

					sub = newSector.addMenu({title : 'Icon Box'}); /* Icon Box content */
					
					sub.add({title : 'Icon Box Container', onclick : function() {
						var str = '[icon-container][icon-header id="1"][icon-title title="Icon Title"][icon-body]Your content[/icon-body][icon-button title="Button Title" url="http://www.cuckoothemes.com"][/icon-container]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Icon Box Header', onclick : function() {
						var str = '[icon-header id="1"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Icon Box Title', onclick : function() {
						var str = '[icon-title title="Icon Title"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Icon Box Body', onclick : function() {
						var str = '[icon-body]Your content[/icon-body]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : 'Icon Box Button', onclick : function() {
						var str = '[icon-button title="Button Title" url="http://www.cuckoothemes.com"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub = newSector.addMenu({title : 'Table'}); /* Icon Box content */
					
					sub.add({title : 'Table Container', onclick : function() {
						var str = '[table]Your Content[/table]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub = newSector.addMenu({title : 'Tabs'}); /* Tab content */
					
					sub.add({title : 'Tab Container', onclick : function() {
						var str = '[tabs][tab title="Title Tab"]Tab Content[/tab][/tabs]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Single Tab', onclick : function() {
						var str = '[tab title="Title Tab"]Tab Content[/tab]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub = newSector.addMenu({title : 'Accordion'}); /* Accordion content */
					
					sub.add({title : 'Accordion Container', onclick : function() {
						var str = '[accordion][accord-item title="Title Accordion"]Accordion Content[/accord-item][/accordion]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : 'Accordion Section', onclick : function() {
						var str = '[accord-item title="Title Accordion"]Accordion Content[/accord-item]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					newSector.add({title : 'Toggle Content', onclick : function() { /* Toggle Content content */
						var str = '[toggle title="Title" fold="false"]Your Content[/toggle]'; 
						window.tinyMCE.activeEditor.selection.setContent(str);	
					}});
					
					sub = newSector.addMenu({title : 'Social Media Buttons'}); /* Social Buttons content */
					
					sub.add({title : "Facebook Like Button", onclick : function() {
						var str = '[fb appId="Your appID" layout="button_count"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					sub.add({title : "Twitter Share Button", onclick : function() {
						var str = '[twitter-share text="Your Share Text" countbox="horizontal"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					sub.add({title : "Twitter Follow Button", onclick : function() {
						var str = '[twitter-follow user="Your Name"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});						
					sub.add({title : "Twitter Feed", onclick : function() {
						var str = '[tweet username="cuckoothemes" count="3"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});										
					sub.add({title : "Google Plus Share Button", onclick : function() {
						var str = '[gplus]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					sub.add({title : "Linkedin Share Button", onclick : function() {
						var str = '[linkedin]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});				
					sub.add({title : "Pinterest Create Button", onclick : function() {
						var str = '[pin-create]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					sub.add({title : "Pinterest Follow Button", onclick : function() {
						var str = '[pin-follow user="Your Name" size="medium"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					sub.add({title : "Social Box Horizontal", onclick : function() {
						var str = '[social-box][sbl][fb appId="Your appID" layout="button_count" width="100px"][/sbl][sbl][twitter-share text="Your Share Text" countbox="horizontal"][/sbl][sbl][gplus][/sbl][sbl][pin-create countbox="horizontal"][/sbl][/social-box]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					sub.add({title : "Social Box Vertical", onclick : function() {
						var str = '[social-box][sbl][fb appId="Your appID" layout="box_count" width="100px"][/sbl][sbl][twitter-share text="Your Share Text" countbox="vertical"][/sbl][sbl][gplus size="tall"][/sbl][sbl][pin-create countbox="vertical"][/sbl][/social-box]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub = newSector.addMenu({title : 'Google Map'}); /* Google Map content */
					
					sub.add({title : "Visible", onclick : function() {
						var str = '[map location="london" zoom="12" popup="no" width="100%" height="475px" align="center"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Lightbox URL", onclick : function() {
						var str = '[maplight location="london" zoom="12" popup="no" width="100%" height="475px" title="Title" text="Map"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Lightbox Image", onclick : function() {
						var str = '[maplight location="london" zoom="12" popup="no" width="100%" height="475px" title="Title" image="Insert the Image URL here"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub = newSector.addMenu({title : 'Youtube/Vimeo Video'}); /* Youtube / Vimeo Video content */
					
					sub.add({title : "Visible", onclick : function() {
						var str = '[video id="Insert the video URL here" width="100%" align="center"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Lightbox URL", onclick : function() {
						var str = '[videolight id="Insert the video URL here" width="100%" title="Title" text="Video"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Lightbox Image", onclick : function() {
						var str = '[videolight id="Insert the video URL here" width="100%" title="Title" image="Insert the Image URL here"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Team
					sub = newSector.addMenu({title : 'Team Members'});
					
					sub.add({title : "Team Member by ID", onclick : function() {
						var str = '[team-member id=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Team Members by IDs", onclick : function() {
						var str = '[team-members ids="" col="4"]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Team Member Categories", onclick : function() {
						var str = '[team-category category=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Team Members Slider", onclick : function() {
						var str = '[team-slider ids=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Team Members Slider 2", onclick : function() {
						var str = '[team-slider-2 memberids=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Team Members Slider 3", onclick : function() {
						var str = '[team-slider-3 category=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					// Works
					sub = newSector.addMenu({title : 'Works'});
					
					sub.add({title : "Works by IDs", onclick : function() {
						var str = '[works ids=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Works by Types", onclick : function() {
						var str = '[works-type type=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Single Work Gallery Slider", onclick : function() {
						var str = '[work-slider workid=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
					
					sub.add({title : "Works Slider", onclick : function() {
						var str = '[works-slider workids=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});					
					
					sub.add({title : "Works Slider by Type", onclick : function() {
						var str = '[works-type-slider type=""]';
						window.tinyMCE.activeEditor.selection.setContent(str);
					}});
				});

				return codes;
			}
			return null;
		}
	});
	tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);

})();