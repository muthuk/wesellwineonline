    <?php $post_meta = of_get_option('post_meta'); ?>
		<?php if ($post_meta=='true' || $post_meta=='') { ?>
			<div class="post-meta">
				<?php _e('Posted on', 'theme1842'); ?> <time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><?php the_time('F d, Y'); ?></time>
				<?php _e('by', 
'theme1842'); ?> <?php the_author_posts_link() ?>
				
			</div><!--.post-meta-->
		<?php } ?>		
