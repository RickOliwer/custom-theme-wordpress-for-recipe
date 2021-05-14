<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bootscore
 */


// Category Badge
if ( ! function_exists( 'bootscore_category_badge' ) ) :
	function bootscore_category_badge() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
            echo '<div class="category-badge mb-2">';
            $thelist = '';
			$i = 0;
            foreach( get_the_category() as $category ) {
		      if ( 0 < $i ) $thelist .= ' ';
						    $thelist .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge bg-secondary">' . $category->name.'</a>';
						    $i++;
            }
            echo $thelist;	
            echo '</div>';
		}
	}
endif;
// Category Badge End

// Recipe Badge
if ( ! function_exists( 'bs_recipe_category_badge' ) ) :
	function bs_recipe_category_badge() {
			$recipes = get_the_terms(get_the_ID(), 'bs_recipe_category');
			if(!$recipes){
				return;
			}
		
            echo '<div class="category-badge mb-2">';
			$badges = [];
			
            foreach( $recipes as $recipe ) {
				$recipe_url = get_term_link($recipe, 'bs_recipe_category');
				$badge = sprintf(
					'<a href="%s" class="badge bg-secondary">%s</a>',
					$recipe_url,
					$recipe->name
				);
				array_push($badges, $badge);
            }
            echo implode(' ', $badges);	
            echo '</div>';
		
	}
endif;
// Recipe Badge End

if(!function_exists('bootscore_recipe_gallery')){
	function bootscore_recipe_gallery(){
		if(!function_exists('get_field')){
			return;
		}

		$gallerySlider = get_field('gallery');

		$length = count($gallerySlider);

		if(!$gallerySlider){
			return;
		}

		?>
			<div class="carousel">
				<i class="fas fa-chevron-left fa-2x carousel_button button-left is-hidden"></i>
					<div class="carousel_track-container">
						<ul class="carousel_track">
							<?php foreach ($gallerySlider as $image) : ?>
							<li class="carousel_slide">
								<?php
									//$img = wp_get_attachment_image_src($image['ID'], 'thumbnail');
									//$img_srcset = wp_get_attachment_image_srcset($image['ID'], 'thumbnail');
								?>
								<img src="<?= $image['url']; ?>" class="carousel_image">
							</li>
							<?php endforeach ; ?>
						</ul>
					</div>
				<i class="fas fa-chevron-right fa-2x carousel_button button-right"></i>


				<div class="carousel_nav">
					<?php for($i = 0 ; $i < $length ; $i++) : ?>
						<button class="carousel_indicator"></button>
					<?php endfor ; ?>
				</div>
    		</div>
		<?php

	}
}


// Category
if ( ! function_exists( 'bootscore_category' ) ) :
	function bootscore_category() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bootscore' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links"></span>', $categories_list ); // WPCS: XSS OK.	
			}		
		}
	}
endif;
// Category End

//Ingredients
if(!function_exists('bootscore_recipe_ingredient')) {
	function bootscore_recipe_ingredient(){
		if(!function_exists('get_field')){
			return;
		}
		if ( have_rows('ingredients')){

			printf('<h4 class="ingredients-header">%s</h4>',
			__('Ingredients', 'bootscore'),
			);

			echo '<div class="servings">';
			printf('<lable for="servings">%s</lable>
					<input 
					id="servings" 
					class="servings-input"
					name="servings-input" 
					type="number" 
					value="2" 
					min="2" 
					max="10" 
					step="2"/>
					<button class="js-decreaseService">-</button>
					<button class="js-increaseService">+</button>',
					__('Servings', 'bootscore'),
					

			);
			echo '</div>';

			//echo '<div class="ingredient-container">';
			while(have_rows('ingredients')){
				the_row();

				$amounts = get_sub_field('amount');
				$measurement = get_sub_field('measurement');
				$ingredient = get_sub_field('ingredient');

			
				printf('<div class="ingredient-card">
							<div class="inner-card-left">
							<div class="value-amount" data-baseValue="%01.1f"><span></span> </div>
							<span> %s</span>
							</div>
							<div class="inner-card-right">
								<span>%s</span>
							</div>
						</div>',
						$amounts,
						$measurement,
						$ingredient,
				);
			}
			//echo '</div>';
		}


	}
}
//Ingredients End

//Instructions
if(!function_exists('bootscore_recipe_instructions')) {
	function bootscore_recipe_instructions(){
		if(!function_exists('get_field')){
			return;
		}
		if ( have_rows('instructions')){

			printf('<h4 class="instructions-header">%s</h4>',
					__('Instructions', 'bootscore'),
			);
			echo '<ul class="instructions">';
			while(have_rows('instructions')){
				the_row();

				$steps = get_sub_field('steps');
				$instruction = get_sub_field('instruction');

				printf('<li class="steps">%d. %s</li>',
						$steps,
						$instruction,
				);
			}
			echo '</ul>';
		}


	}
}
//Instructions End

// Servings
if(!function_exists('bootscore_recipe_servings')){
	function bootscore_recipe_servings(){
		$servings = get_field('servings', false, false);

		if(!empty($servings)) {

			printf('<h4 class="ingredients-header">%s</h4>',
			__('Ingredients', 'bootscore'),
			);

			echo '<div class="servings">';
			printf('<lable for="servings">%s</lable>
					<input 
					id="servings" 
					class="servings-input"
					name="servings-input" 
					type="number" 
					value="%s" 
					min="2" 
					max="10" 
					step="2"/>
					<button class="js-decreaseService">-</button>
					<button class="js-increaseService">+</button>',
					__('Servings', 'bootscore'),
					$servings,

			);
			echo '</div>';
		}
	}
}
//Servings End
// Date
if ( ! function_exists( 'bootscore_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bootscore_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time> <span class="time-updated-separator">/</span> <time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			'%s',
			'<span rel="bookmark">' . $time_string . '</span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;
// Date End


// Author
if ( ! function_exists( 'bootscore_author' ) ) :

	function bootscore_author() {
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'bootscore' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;
// Author End


// Comments
if ( ! function_exists( 'bootscore_comments' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bootscore_comments() {


		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' | <i class="far fa-comments"></i> <span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment', 'bootscore' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	
	}
endif;
// Comments End


// Edit Link
if ( ! function_exists( 'bootscore_edit' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function bootscore_edit() {

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit', 'bootscore' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			' | <span class="edit-link">',
			'</span>'
		);
	}
endif;
// Edit Link End
		

// Single Comments Count
if ( ! function_exists( 'bootscore_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function bootscore_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo ' | <i class="far fa-comments"></i> <span class="comments-link">';

			/* translators: %s: Name of current post. Only visible to screen readers. */
			// comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'bootscore' ), get_the_title() ) );
			comments_popup_link( sprintf( __( 'Leave a comment', 'bootscore' ), get_the_title() ) );


			echo '</span>';
		}
	}
endif;
// Single Comments Count End


// Tags
if ( ! function_exists( 'bootscore_tags' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bootscore_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {


			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="tags-links mt-2">' . esc_html__( 'Tagged %1$s', 'bootscore' ) . '</div>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;


add_filter( "term_links-post_tag", 'add_tag_class');

function add_tag_class($links) {
    return str_replace('<a href="', '<a class="badge bg-secondary" href="', $links);
}
// Tags End


// Featured Image
if ( ! function_exists( 'bootscore_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bootscore_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('full', array('class' => 'rounded mb-3')); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
// Featured Image End


// Internet Explorer Warning Alert
if ( ! function_exists( 'bootscore_ie_alert' ) ) :
	/**
	 * Displays an alert if page is browsed by Internet Explorer
	 */
	function bootscore_ie_alert() {
            $ua = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
            if (preg_match('~MSIE|Internet Explorer~i', $ua) || (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false)) {
                echo '
                    <div class="container pt-5">
                        <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                            <h1>' . esc_html__( 'Internet Explorer detected', 'bootscore' ) . '</h1>
                            <p class="lead">' . esc_html__( 'This website will offer limited functionality in this browser.', 'bootscore' ) . '</p>
                            <p class="lead">' . esc_html__( 'Please use a modern and secure web browser like', 'bootscore' ) . ' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ' . esc_html__( 'or', 'bootscore' ) . ' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ' . esc_html__( 'to display this site correctly.', 'bootscore' ) . '</p>
                        </div>
                    </div>
               ';
            }
        
	}
endif;


