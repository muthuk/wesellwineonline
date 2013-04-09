  </div><!--.container-->
	<footer id="footer">
  	<div id="back-top-wrapper">
    	<p id="back-top">
        <span><a href="#top"><?php _e('top','theme1842'); ?></a></span>
      </p>
    </div>
		<div class="container_12 clearfix">
			<div id="copyright" class="clearfix">
				<div class="grid_12">
					<div id="footer-text">
						<?php $myfooter_text = of_get_option('footer_text'); ?>
						<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a>
						<?php if($myfooter_text){?>
							<?php echo of_get_option('footer_text'); ?>
						<?php } else { ?>
							 <?php _e('&copy; 2012&nbsp; |&nbsp; ', 'theme1842'); ?> 
							<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy"><?php _e('Privacy Policy', 'theme1842'); ?></a>
						<?php } ?>
						<?php if( is_front_page() ) { ?>
						More Wine WordPress Themes at <a rel="nofollow" href="http://www.templatemonster.com/category/wine-wordpress-themes/" target="_blank">TemplateMonster.com</a>
						<?php } ?>
					</div>
					<div id="widget-footer" class="clearfix">
						<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
                          <!--Widgetized Footer-->
                        <?php endif ?>
                    </div>
				</div>
			</div>
		</div><!--.container-->
	</footer>
	<?php if( is_front_page() ) { ?></div></div><?php } ?>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>
</body>
</html>