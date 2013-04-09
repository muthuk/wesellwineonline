<?php
function elegance_widgets_init() {
	// Before Menu Area
	// Location: at the top of the page
	register_sidebar(array(
		'name'					=> 'Before Menu Area',
		'id' 						=> 'before-menu-area',
		'description'   => __( 'Located at the top of the page.'),
		'before_widget' => '<div id="%1$s" class="grid_12">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Before Content Area
	// Location: at the top of the content
	register_sidebar(array(
		'name'					=> 'Before Content Area',
		'id' 						=> 'before-content-area',
		'description'   => __( 'Located at the top of the content.'),
		'before_widget' => '<div id="%1$s" class="grid_4">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Bottom Content Area
	// Location: at the bottom of the content
	register_sidebar(array(
		'name'					=> 'Bottom Content Area',
		'id' 						=> 'bottom Content Area',
		'description'   => __( 'Located at the bottom of the content.'),
		'before_widget' => '<div id="%1$s" class="grid_4 bottom-widget"><div class="inner">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id' 						=> 'main-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	// Footer Widget
	// Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'					=> 'Footer',
		'id' 						=> 'footer-sidebar',
		'description'   => __( 'Located at the bottom of pages.'),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' );
?>