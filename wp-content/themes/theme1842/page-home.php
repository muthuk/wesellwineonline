<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
<div class="clearfix">
  <div class="before-content-block">
  	<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
      <!--Widgetized 'Before Content Area' for the home page-->
    <?php endif ?>
    <div class="clear"></div>
  </div>
  <div class="home-page-content">
  	<!-- Content -->
	  <?php if (have_posts()) : while (have_posts()) : the_post();  ?>
        <?php   the_content(); ?>
      <?php endwhile; endif; ?>
    <!-- End Content -->
  </div>  
</div>

</div>
<div class="footer">
<div>
<div class="container_12 primary_content_wrap clearfix">
<div class="clearfix">
	<div class="bottom-content-block">
		<?php if ( ! dynamic_sidebar( 'Bottom Content Area' ) ) : ?>
		  <!--Widgetized 'Before Content Area' for the home page-->
		<?php endif ?>
		<div class="clear"></div>
	</div>
</div>
<?php get_footer(); ?>