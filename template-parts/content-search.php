<?php
	/**
	 * Template part for displaying results in search pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bootscore
	 */
	
	?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="my-grid-item">
		<div class="my-card">
			<a href="<?php the_permalink(); ?>">
				<?php if (has_post_thumbnail() )
					echo get_the_post_thumbnail(null, 'medium', ['class' => 'my-card-img']);
				?>
			</a>
			<div class="my-card-content">
				<?php if ( 'bs_recipe' === get_post_type() ) : ?>
					<p class="entry-meta my-card-entry-meta">
						<small class="text-muted">
							<?php
								bootscore_date();
								_e(' by ', 'bootscore'); the_author_posts_link();
								bootscore_comment_count();							
							?>
						</small>
					</p>
				<?php endif; ?>
				<h2 class="my-card-header">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="my-card-text">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	</div>
</article>
<!-- #post-<?php the_ID(); ?> -->