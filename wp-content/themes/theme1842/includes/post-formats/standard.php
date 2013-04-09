			<?php if(!is_singular()) { $postclass = 'post-holder not-single';} else {$postclass='post-holder single';} ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class($postclass); ?>>
					
				<header class="entry-header">
				
				<?php if(!is_singular()) : ?>
				
				<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to:', 'theme1842');?> <?php the_title(); ?>"><?php the_title(); ?></a></h4>
				
				<?php else :?>
				
				<h1 class="entry-title"><?php the_title(); ?></h1>
				
				<?php endif; ?>
				
				<?php get_template_part('includes/post-formats/post-meta'); ?>
				
				</header>
				
				
				<?php get_template_part('includes/post-formats/post-thumb'); ?>
				
				
				<?php if(!is_singular()) : ?>
				
				<div class="post-content">
					<?php $post_excerpt = of_get_option('post_excerpt'); ?>
					<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
					
						<div class="excerpt">
						
						
						<?php 
						
						$content = get_the_content();
						$excerpt = get_the_excerpt();

						if (has_excerpt()) {

								the_excerpt();

						} else {
						
								if(!is_search()) {

								echo my_string_limit_words($content,50);
								
								} else {
								
								echo my_string_limit_words($excerpt,50);
								
								}

						}
						
						
						?>
						
						</div>
						
						
					<?php } ?>
                    <div class="clear"></div>
					<a href="<?php the_permalink() ?>" class="button"><?php _e('more', 'theme1842'); ?></a>
                    <div class="post-comments"><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></div>
				</div>
				
				<?php else :?>
				
				<div class="content">
				
					<?php the_content(''); ?>
					
				<!--// .content -->
				</div>
				
				<?php endif; ?>
				
				<?php if(is_singular()) : ?>
				<footer class="post-footer">
					<?php the_tags('Tags: ', ' ', '');?>
				</footer>
			 	<?php endif; ?>
			</article>