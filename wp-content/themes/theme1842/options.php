<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

if(!function_exists('optionsframework_option_name')) {
	function optionsframework_option_name() {
		// This gets the theme name from the stylesheet (lowercase and without spaces)
		$themename = 'theme1842';
		
		$optionsframework_settings = get_option('optionsframework');
		$optionsframework_settings['id'] = $themename;
		update_option('optionsframework', $optionsframework_settings);
		
	}
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

 
if(!function_exists('optionsframework_options')) {

	function optionsframework_options() {
	
		// Logo type
		$logo_type = array(
			"image_logo" => __("Image Logo", 'options_framework_theme'),
			"text_logo" => __("Text Logo", 'options_framework_theme')
		);
		
		// Background Defaults
		$background_defaults = array(
			'color' => '', 
			'image' => '', 
			'repeat' => 'repeat',
			'position' => 'top center',
			'attachment'=>'scroll'
		);
		
		// Superfish fade-in animation
		$sf_f_animation_array = array(
			"show" => "Enable fade-in animation",
			"false" => "Disable fade-in animation"
		);
		
		// Superfish slide-down animation
		$sf_sl_animation_array = array(
			"show" => "Enable slide-down animation",
			"false" => "Disable slide-down animation"
		);
		
		// Superfish animation speed
		$sf_speed_array = array(
			"slow" => "Slow","normal" => "Normal",
			"fast" => "Fast"
		);
		
		// Superfish arrows markup
		$sf_arrows_array = array(
			"true" => "Yes",
			"false" => "No"
		);
		
		// Fonts
		$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
		asort($typography_mixed_fonts);
		
		
		// Slider effects
		$sl_effect_array = array("random" => "random", "fold" => "fold", "fade" => "fade", "sliceDown" => "sliceDown", "sliceDownLeft" => "sliceDownLeft", "sliceUp" => "sliceUp", "sliceUpLeft" => "sliceUpLeft", "sliceUpDown" => "sliceUpDown", "sliceUpDownLeft" => "sliceUpDownLeft", "slideInRight" => "slideInRight", "slideInLeft" => "slideInLeft", "boxRandom" => "boxRandom", "boxRain" => "boxRain", "boxRainReverse" => "boxRainReverse", "boxRainGrow" => "boxRainGrow", "boxRainGrowReverse" => "boxRainGrowReverse");
		
		// Slider slices
		$sl_slices_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");
		
		// Slider box columns
		$sl_box_columns_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");
		
		// Slider box rows
		$sl_box_rows_array = array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20");
		
		// Slider direct navigation
		$sl_dir_nav_array = array("true" => "Yes","false" => "No");
		
		// Slider direct navigation on hover
		$sl_dir_nav_hide_array = array("true" => "Yes","false" => "No");
		
		// Slider control navigation
		$sl_control_nav_array = array("true" => "Yes","false" => "No");
		
		// Featured image size on the blog.
		$post_image_size_array = array("normal" => "Normal size","large" => "Large size");
		
		// Featured image size on the single page.
		$single_image_size_array = array("normal" => "Normal size","large" => "Large size");
		
		// Meta for blog
		$post_meta_array = array("true" => "Yes","false" => "No");
		
		// Meta for blog
		$post_excerpt_array = array(
			"true" => "Yes",
			"false" => "No"
		);
		
		
		
		
		
		// Pull all the categories into an array
		$options_categories = array();  
		$options_categories_obj = get_categories();
		foreach ($options_categories_obj as $category) {
				$options_categories[$category->cat_ID] = $category->cat_name;
		}
		
		// Pull all the pages into an array
		$options_pages = array();  
		$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
		$options_pages[''] = 'Select a page:';
		foreach ($options_pages_obj as $page) {
				$options_pages[$page->ID] = $page->post_title;
		}
			
		// If using image radio buttons, define a directory path
		$imagepath =  get_bloginfo('template_directory') . '/includes/images/';
			
		$options = array();
		
		$options[] = array( "name" => "General",
							"type" => "heading");
		
		$options['body_background'] = array( 
							"name" =>  "Body styling",
							"desc" => "Change the background style.",
							"id" => "body_background",
							"std" => $background_defaults, 
							"type" => "background");
		
		$options['header_color'] = array( "name" => "Header background color",
							"desc" => "Change the header background color.",
							"id" => "header_color",
							"std" => "",
							"type" => "color");
		
		$options['links_color'] = array( "name" => "Buttons and links color",
							"desc" => "Change the color of buttons and links.",
							"id" => "links_color",
							"std" => "",
							"type" => "color");
							
							
		$options['google_mixed_3'] = array( 'name' => 'Body Text',
							'desc' => 'Choose your prefered font for body text. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'google_mixed_3',
							'std' => array( 'size' => '12px', 'face' => 'Arial', 'color' => '#333'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
							
		$options['h1_heading'] = array( 'name' => 'H1 Heading',
							'desc' => 'Choose your prefered font for H1 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h1_heading',
							'std' => array( 'size' => '32px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
		
		$options['h2_heading'] = array( 'name' => 'H2 Heading',
							'desc' => 'Choose your prefered font for H2 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h2_heading',
							'std' => array( 'size' => '24px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
							
		$options['h3_heading'] = array( 'name' => 'H3 Heading',
							'desc' => 'Choose your prefered font for H3 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h3_heading',
							'std' => array( 'size' => '18px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
		
		$options['h4_heading'] = array( 'name' => 'H4 Heading',
							'desc' => 'Choose your prefered font for H4 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h4_heading',
							'std' => array( 'size' => '14px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
							
		$options['h5_heading'] = array( 'name' => 'H5 Heading',
							'desc' => 'Choose your prefered font for H5 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h5_heading',
							'std' => array( 'size' => '12px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
							
		$options['h6_heading'] = array( 'name' => 'H6 Heading',
							'desc' => 'Choose your prefered font for H6 heading and titles. <em>Note: fonts marked with <strong>*</strong> symbol are uploaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.</em>',
							'id' => 'h6_heading',
							'std' => array( 'size' => '10px', 'face' => 'Arial', 'color' => '#222'),
							'type' => 'typography',
							'options' => array(
									'faces' => $typography_mixed_fonts )
							);
		
		$options[] = array( "name" => "Custom CSS",
							"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
							"id" => "custom_css",
							"std" => "",
							"type" => "textarea");
		
		
		
		
		
		$options[] = array( "name" => "Logo & Favicon",
							"type" => "heading");
		
		$options['logo_type'] = array( "name" => "What kind of logo?",
							"desc" => "Select whether you want your main logo to be an image or text. If you select 'image' you can put in the image url in the next option, and if you select 'text' your Site Title will show instead.",
							"id" => "logo_type",
							"std" => "image_logo",
							"type" => "radio",
							"options" => $logo_type);
		
		$options['logo_url'] = array( "name" => "Logo Image Path",
							"desc" => "Enter the direct path to your <strong>logo image</strong>. For example <em>http://your_website_url_here/wp-content/themes/themeXXXX/images/logo.png</em>",
							"id" => "logo_url",
							"type" => "upload");
							
		$options['favicon'] = array( "name" => "Favicon",
							"desc" => "Enter the direct path to your <strong>favicon</strong>. For example <em>http://your_website_url_here/wp-content/themes/themeXXXX/images/logo.png</em>",
							"id" => "favicon",
							"type" => "upload");
							
		
		
		$options[] = array( "name" => "Navigation",
							"type" => "heading");
		
		$options[] = array( "name" => "Delay",
							"desc" => "miliseconds delay on mouseout.",
							"id" => "sf_delay",
							"std" => "1000",
							"class" => "mini",
							"type" => "text");
		
		$options[] = array( "name" => "Fade-in animation",
							"desc" => "Fade-in animation.",
							"id" => "sf_f_animation",
							"std" => "show",
							"type" => "radio",
							"options" => $sf_f_animation_array);
		
		$options[] = array( "name" => "Slide-down animation",
							"desc" => "Slide-down animation.",
							"id" => "sf_sl_animation",
							"std" => "show",
							"type" => "radio",
							"options" => $sf_sl_animation_array);
		
		$options[] = array( "name" => "Speed",
							"desc" => "Animation speed.",
							"id" => "sf_speed",
							"type" => "select",
							"std" => "normal",
							"class" => "tiny", //mini, tiny, small
							"options" => $sf_speed_array);
		
		$options[] = array( "name" => "Arrows markup",
							"desc" => "Do you want to generate arrow mark-up?",
							"id" => "sf_arrows",
							"std" => "false",
							"type" => "radio",
							"options" => $sf_arrows_array);
		
		
		
		$options[] = array( "name" => "Slider",
							"type" => "heading");
		
		$options['sl_effect'] = array( "name" => "Slider effect",
							"desc" => "Slider effect.",
							"id" => "sl_effect",
							"std" => "random",
							"type" => "select",
							"class" => "small", //mini, tiny, small
							"options" => $sl_effect_array);
		
		$options['sl_slices'] = array( "name" => "Number of slices",
							"desc" => "Number of slices (for effects based on slice animation).",
							"id" => "sl_slices",
							"std" => "15",
							"type" => "select",
							"class" => "small", //mini, tiny, small
							"options" => $sl_slices_array);
		
		$options['sl_box_columns'] = array( "name" => "Box columns",
							"desc" => "Box columns (for effects based on box animation).",
							"id" => "sl_box_columns",
							"std" => "8",
							"type" => "select",
							"class" => "small", //mini, tiny, small
							"options" => $sl_box_columns_array);
		
		$options['sl_box_rows'] = array( "name" => "Box rows",
							"desc" => "Box rows (for effects based on box animation).",
							"id" => "sl_box_rows",
							"std" => "8",
							"type" => "select",
							"class" => "small", //mini, tiny, small
							"options" => $sl_box_rows_array);
		
		$options['sl_animation_speed'] = array( "name" => "Animation speed",
							"desc" => "Animation speed (ms).",
							"id" => "sl_animation_speed",
							"std" => "500",
							"class" => "mini",
							"type" => "text");
		
		$options['sl_pausetime'] = array( "name" => "Pause time",
							"desc" => "Pause time (ms).",
							"id" => "sl_pausetime",
							"std" => "5000",
							"class" => "mini",
							"type" => "text");
		
		$options['sl_dir_nav'] = array( "name" => "Display next & prev navigation?",
							"desc" => "Display next & prev navigation?",
							"id" => "sl_dir_nav",
							"std" => "true",
							"type" => "radio",
							"options" => $sl_dir_nav_array);
		
		$options['sl_dir_nav_hide'] = array( "name" => "Display next & prev navigation only on hover?",
							"desc" => "If you choose No - always visible, Yes - visible only on hover. <strong>Note: next & prev navigation must be enable (previous option)</strong>",
							"id" => "sl_dir_nav_hide",
							"std" => "false",
							"type" => "radio",
							"options" => $sl_dir_nav_hide_array);
		
		$options['sl_control_nav'] = array( "name" => "Show pagination",
							"desc" => "Do you want to show pagination?",
							"id" => "sl_control_nav",
							"std" => "true",
							"type" => "radio",
							"options" => $sl_control_nav_array);
		
		$options['sl_caption_opacity'] = array( "name" => "Opacity of caption",
							"desc" => "Universal caption opacity (0.8 by default).",
							"id" => "sl_caption_opacity",
							"std" => "0.8",
							"class" => "mini",
							"type" => "text");
		
		
		
		$options[] = array( "name" => "Blog",
							"type" => "heading");
		
		$options[] = array( "name" => "Blog Title",
							"desc" => "Enter Your Blog Title used on Blog page.",
							"id" => "blog_text",
							"std" => "Blog",
							"type" => "text");
		
		$options[] = array( "name" => "Related Posts Title",
							"desc" => "Enter Your Title used on Single Post page for related posts.",
							"id" => "blog_related",
							"std" => "Related Posts",
							"type" => "text");
		
		$options['blog_sidebar_pos'] = array( "name" => "Sidebar position",
							"desc" => "Choose sidebar position.",
							"id" => "blog_sidebar_pos",
							"std" => "right",
							"type" => "images",
							"options" => array(
								'left' => $imagepath . '2cl.png',
								'right' => $imagepath . '2cr.png',)
							);
		
		$options['post_image_size'] = array( "name" => "Blog image size",
							"desc" => "Featured image size on the blog.",
							"id" => "post_image_size",
							"type" => "select",
							"std" => "normal",
							"class" => "small", //mini, tiny, small
							"options" => $post_image_size_array);
		
		$options['single_image_size'] = array( "name" => "Single post image size",
							"desc" => "Featured image size on the single page.",
							"id" => "single_image_size",
							"type" => "select",
							"std" => "normal",
							"class" => "small", //mini, tiny, small
							"options" => $single_image_size_array);
		
		$options['post_meta'] = array( "name" => "Enable Meta for blog posts?",
							"desc" => "Enable or Disable meta information for blog posts.",
							"id" => "post_meta",
							"std" => "true",
							"type" => "radio",
							"options" => $post_meta_array);
		
		$options['post_excerpt'] = array( "name" => "Enable excerpt for blog posts?",
							"desc" => "Enable or Disable excerpt for blog posts.",
							"id" => "post_excerpt",
							"std" => "true",
							"type" => "radio",
							"options" => $post_excerpt_array);
		
		
		
		
		$options[] = array( "name" => "Footer",
							"type" => "heading");
		
		$options['footer_text'] = array( "name" => "Footer copyright text",
							"desc" => "Enter text used in the right side of the footer. HTML tags are allowed.",
							"id" => "footer_text",
							"std" => "",
							"type" => "textarea");
		
		$options[] = array( "name" => "Google Analytics Code",
							"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
							"id" => "ga_code",
							"std" => "",
							"type" => "textarea");
		
		$options['feed_url'] = array( "name" => "Feedburner URL",
							"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website.",
							"id" => "feed_url",
							"std" => "",
							"type" => "text");
		
		return $options;
	}
	
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');


if(!function_exists('optionsframework_custom_scripts')) {

	function optionsframework_custom_scripts() { ?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {

			$('#example_showhidden').click(function() {
					$('#section-example_text_hidden').fadeToggle(400);
			});
			
			if ($('#example_showhidden:checked').val() !== undefined) {
				$('#section-example_text_hidden').show();
			}
			
		});
		</script>

		<?php
		}

}



/**
* Front End Customizer
*
* WordPress 3.4 Required
*/
add_action( 'customize_register', 'theme1842_register' );

if(!function_exists('theme1842_register')) {

	function theme1842_register($wp_customize) {
		/**
		 * This is optional, but if you want to reuse some of the defaults
		 * or values you already have built in the options panel, you
		 * can load them into $options for easy reference
		 */
		$options = optionsframework_options();
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	General
		/*-----------------------------------------------------------------------------------*/
		$wp_customize->add_section( 'theme1842_header', array(
			'title' => __( 'General', 'theme1842' ),
			'priority' => 200
		));
		
		/* Background Image*/
		$wp_customize->add_setting( 'theme1842[body_background][image]', array(
			'default' => $options['body_background']['std']['image'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'body_background_image', array(
			'label'   => 'Background Image',
			'section' => 'theme1842_header',
			'settings'   => 'theme1842[body_background][image]'
		) ) );
		
		
		/* Background Color*/
		$wp_customize->add_setting( 'theme1842[body_background][color]', array(
			'default' => $options['body_background']['std']['color'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_background', array(
			'label'   => 'Background Color',
			'section' => 'theme1842_header',
			'settings'   => 'theme1842[body_background][color]'
		) ) );
		
		/* Header Color */
		$wp_customize->add_setting( 'theme1842[header_color]', array(
			'default' => $options['header_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
			'label'   => $options['header_color']['name'],
			'section' => 'theme1842_header',
			'settings'   => 'theme1842[header_color]'
		) ) );
		
		
		/* Body Font Face */
		$wp_customize->add_setting( 'theme1842[google_mixed_3][face]', array(
			'default' => $options['google_mixed_3']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_google_mixed_3', array(
				'label' => $options['google_mixed_3']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[google_mixed_3][face]',
				'type' => 'select',
				'choices' => $options['google_mixed_3']['options']['faces']
		) );
		
		
		/* Buttons and Links Color */
		$wp_customize->add_setting( 'theme1842[links_color]', array(
			'default' => $options['links_color']['std'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'links_color', array(
			'label'   => $options['links_color']['name'],
			'section' => 'theme1842_header',
			'settings'   => 'theme1842[links_color]'
		) ) );
		
		/* H1 Heading font face */
		$wp_customize->add_setting( 'theme1842[h1_heading][face]', array(
			'default' => $options['h1_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h1_heading', array(
				'label' => $options['h1_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h1_heading][face]',
				'type' => 'select',
				'choices' => $options['h1_heading']['options']['faces']
		) );
		
		/* H2 Heading font face */
		$wp_customize->add_setting( 'theme1842[h2_heading][face]', array(
			'default' => $options['h2_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h2_heading', array(
				'label' => $options['h2_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h2_heading][face]',
				'type' => 'select',
				'choices' => $options['h2_heading']['options']['faces']
		) );
		
		/* H6 Heading font face */
		$wp_customize->add_setting( 'theme1842[h6_heading][face]', array(
			'default' => $options['h6_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h6_heading', array(
				'label' => $options['h6_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h6_heading][face]',
				'type' => 'select',
				'choices' => $options['h6_heading']['options']['faces']
		) );
		
		/* H5 Heading font face */
		$wp_customize->add_setting( 'theme1842[h5_heading][face]', array(
			'default' => $options['h5_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h5_heading', array(
				'label' => $options['h5_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h5_heading][face]',
				'type' => 'select',
				'choices' => $options['h5_heading']['options']['faces']
		) );
		
		/* H4 Heading font face */
		$wp_customize->add_setting( 'theme1842[h4_heading][face]', array(
			'default' => $options['h4_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h4_heading', array(
				'label' => $options['h4_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h4_heading][face]',
				'type' => 'select',
				'choices' => $options['h4_heading']['options']['faces']
		) );
		
		/* H3 Heading font face */
		$wp_customize->add_setting( 'theme1842[h3_heading][face]', array(
			'default' => $options['h2_heading']['std']['face'],
			'type' => 'option'
		) );
		
		$wp_customize->add_control( 'theme1842_h3_heading', array(
				'label' => $options['h3_heading']['name'],
				'section' => 'theme1842_header',
				'settings' => 'theme1842[h3_heading][face]',
				'type' => 'select',
				'choices' => $options['h3_heading']['options']['faces']
		) );
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Logo
		/*-----------------------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'theme1842_logo', array(
			'title' => __( 'Logo', 'theme1842' ),
			'priority' => 201
		) );
		
		/* Logo Type */
		$wp_customize->add_setting( 'theme1842[logo_type]', array(
				'default' => $options['logo_type']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_logo_type', array(
				'label' => $options['logo_type']['name'],
				'section' => 'theme1842_logo',
				'settings' => 'theme1842[logo_type]',
				'type' => $options['logo_type']['type'],
				'choices' => $options['logo_type']['options']
		) );
		
		/* Logo Path */
		$wp_customize->add_setting( 'theme1842[logo_url]', array(
			'type' => 'option'
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_url', array(
			'label' => $options['logo_url']['name'],
			'section' => 'theme1842_logo',
			'settings' => 'theme1842[logo_url]'
		) ) );
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Slider
		/*-----------------------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'theme1842_slider', array(
			'title' => __( 'Slider', 'theme1842' ),
			'priority' => 202
		) );
		
		/* Slider Effect */
		$wp_customize->add_setting( 'theme1842[sl_effect]', array(
				'default' => $options['sl_effect']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_effect', array(
				'label' => $options['sl_effect']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_effect]',
				'type' => $options['sl_effect']['type'],
				'choices' => $options['sl_effect']['options']
		) );
		
		/* Slices */
		$wp_customize->add_setting( 'theme1842[sl_slices]', array(
				'default' => $options['sl_slices']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_slices', array(
				'label' => $options['sl_slices']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_slices]',
				'type' => $options['sl_slices']['type'],
				'choices' => $options['sl_slices']['options']
		) );
		
		/* Box columns */
		$wp_customize->add_setting( 'theme1842[sl_box_columns]', array(
				'default' => $options['sl_box_columns']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_box_columns', array(
				'label' => $options['sl_box_columns']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_box_columns]',
				'type' => $options['sl_box_columns']['type'],
				'choices' => $options['sl_box_columns']['options']
		) );
		
		/* Box rows */
		$wp_customize->add_setting( 'theme1842[sl_box_rows]', array(
				'default' => $options['sl_box_rows']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_box_rows', array(
				'label' => $options['sl_box_rows']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_box_rows]',
				'type' => $options['sl_box_rows']['type'],
				'choices' => $options['sl_box_rows']['options']
		) );
		
		
		/* Animation speed */
		$wp_customize->add_setting( 'theme1842[sl_animation_speed]', array(
				'default' => $options['sl_animation_speed']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_animation_speed', array(
				'label' => $options['sl_animation_speed']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_animation_speed]',
				'type' => $options['sl_animation_speed']['type']
		) );
		
		/* Pause time */
		$wp_customize->add_setting( 'theme1842[sl_pausetime]', array(
				'default' => $options['sl_pausetime']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_pausetime', array(
				'label' => $options['sl_pausetime']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_pausetime]',
				'type' => $options['sl_pausetime']['type']
		) );
		
		
		/* Display next & prev navigation? */
		$wp_customize->add_setting( 'theme1842[sl_dir_nav]', array(
				'default' => $options['sl_dir_nav']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_dir_nav', array(
				'label' => $options['sl_dir_nav']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_dir_nav]',
				'type' => $options['sl_dir_nav']['type'],
				'choices' => $options['sl_dir_nav']['options']
		) );
		
		
		/* Display next & prev navigation only on hover? */
		$wp_customize->add_setting( 'theme1842[sl_dir_nav_hide]', array(
				'default' => $options['sl_dir_nav_hide']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_dir_nav_hide', array(
				'label' => $options['sl_dir_nav_hide']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_dir_nav_hide]',
				'type' => $options['sl_dir_nav_hide']['type'],
				'choices' => $options['sl_dir_nav_hide']['options']
		) );
		
		
		/* Show pagination? */
		$wp_customize->add_setting( 'theme1842[sl_control_nav]', array(
				'default' => $options['sl_control_nav']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_sl_control_nav', array(
				'label' => $options['sl_control_nav']['name'],
				'section' => 'theme1842_slider',
				'settings' => 'theme1842[sl_control_nav]',
				'type' => $options['sl_control_nav']['type'],
				'choices' => $options['sl_control_nav']['options']
		) );
		
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Blog
		/*-----------------------------------------------------------------------------------*/
		
		
		$wp_customize->add_section( 'theme1842_blog', array(
				'title' => __( 'Blog', 'theme1842' ),
				'priority' => 203
		) );
		
		/* Blog image size */
		$wp_customize->add_setting( 'theme1842[post_image_size]', array(
				'default' => $options['post_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_post_image_size', array(
				'label' => $options['post_image_size']['name'],
				'section' => 'theme1842_blog',
				'settings' => 'theme1842[post_image_size]',
				'type' => $options['post_image_size']['type'],
				'choices' => $options['post_image_size']['options']
		) );
		
		/* Single post image size */
		$wp_customize->add_setting( 'theme1842[single_image_size]', array(
				'default' => $options['single_image_size']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_single_image_size', array(
				'label' => $options['single_image_size']['name'],
				'section' => 'theme1842_blog',
				'settings' => 'theme1842[single_image_size]',
				'type' => $options['single_image_size']['type'],
				'choices' => $options['single_image_size']['options']
		) );
		
		/* Post Meta */
		$wp_customize->add_setting( 'theme1842[post_meta]', array(
				'default' => $options['post_meta']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_post_meta', array(
				'label' => $options['post_meta']['name'],
				'section' => 'theme1842_blog',
				'settings' => 'theme1842[post_meta]',
				'type' => $options['post_meta']['type'],
				'choices' => $options['post_meta']['options']
		) );
		
		/* Post Excerpt */
		$wp_customize->add_setting( 'theme1842[post_excerpt]', array(
				'default' => $options['post_excerpt']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_post_excerpt', array(
				'label' => $options['post_excerpt']['name'],
				'section' => 'theme1842_blog',
				'settings' => 'theme1842[post_excerpt]',
				'type' => $options['post_excerpt']['type'],
				'choices' => $options['post_excerpt']['options']
		) );
		
		
		
		/*-----------------------------------------------------------------------------------*/
		/*	Footer
		/*-----------------------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'theme1842_footer', array(
			'title' => __( 'Footer', 'theme1842' ),
			'priority' => 204
		) );
			
		/* Footer Copyright Text */
		$wp_customize->add_setting( 'theme1842[footer_text]', array(
				'default' => $options['footer_text']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_footer_text', array(
				'label' => $options['footer_text']['name'],
				'section' => 'theme1842_footer',
				'settings' => 'theme1842[footer_text]',
				'type' => 'text'
		) );
		
		
		/* Display Footer Menu */
		$wp_customize->add_setting( 'theme1842[footer_menu]', array(
				'default' => $options['footer_menu']['std'],
				'type' => 'option'
		) );
		$wp_customize->add_control( 'theme1842_footer_menu', array(
				'label' => $options['footer_menu']['name'],
				'section' => 'theme1842_footer',
				'settings' => 'theme1842[footer_menu]',
				'type' => $options['footer_menu']['type'],
				'choices' => $options['footer_menu']['options']
		) );
		

		
	};

}