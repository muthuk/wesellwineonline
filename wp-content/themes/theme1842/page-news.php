<?php
/**
 * Template Name: News
 */

get_header(); ?>
	<div id="content" class="grid_7 suffix_1 <?php echo of_get_option('blog_sidebar_pos') ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div id="page-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
    <?php
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('post_type=misc&misc_category=news&showposts=4&paged='.$paged);
    ?>
    <?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <article id="post-<?php the_ID(); ?>" class="post-holder news-block">
      	<h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
        <div class="post-content">
					<?php if(has_post_thumbnail()) { ?>
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 120, 120, true ); //resize & crop img
						?>
                        <a href="<?php the_permalink() ?>">
						<figure class="featured-thumbnail">
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						</figure>
                        </a>
          <?php } ?>
          <div class="post-content-inner">
          
          <div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,30);?></div>
          <a href="<?php the_permalink() ?>" class="link"><?php _e('Read more', 'theme1842'); ?></a>
          </div>
          <div class="clear"></div>
        </div>
      </article>
      
    <?php endwhile; else: ?>
      <div class="no-results">
				<?php echo '<p><strong>' . __('There has been an error.', 'theme1842') . '</strong></p>'; ?>
        <p><?php _e('We apologize for any inconvenience, please', 'theme1842'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1842'); ?></a> <?php _e('or use the search form below.', 'theme1842'); ?></p>
        <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
      </div><!--no-results-->
    <?php endif; ?>
    
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="oldernewer">
          <div class="older">
            <?php next_posts_link( __('&laquo; Older', 'theme1842')) ?>
          </div><!--.older-->
          <div class="newer">
            <?php previous_posts_link(__('Newer &raquo;', 'theme1842')) ?>
          </div><!--.newer-->
        </nav><!--.oldernewer-->
      <?php endif; ?>
    
    <?php $wp_query = null; $wp_query = $temp;?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>