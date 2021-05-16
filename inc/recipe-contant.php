<?php 

// Gallery
if(!function_exists('bootscore_recipe_gallery')){
	function bootscore_recipe_gallery(){
		if(!function_exists('get_field')){
			return;
		}

		$gallerySlider = get_field('gallery');

		

		if(!$gallerySlider){
			return;
		}

		?>
		<div class="gallery-container">
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
								<a href="<?= $image['url'];?>"  data-lightbox="recipe">
									<img src="<?= $image['url']; ?>" class="carousel_image">
								</a>
							</li>
							<?php endforeach ; ?>
						</ul>
					</div>
				<i class="fas fa-chevron-right fa-2x carousel_button button-right"></i>


				<div class="carousel_nav">
					<?php $length = count($gallerySlider); ?>
					<?php for($i = 0 ; $i < $length ; $i++) : ?>
						<button class="carousel_indicator"></button>
					<?php endfor ; ?>
				</div>
			</div>
		</div>
		<?php

	}
}
// Gallery End.

// Cooking Time
if(!function_exists('bootscore_recipe_cookingTime')){
	function bootscore_recipe_cookingTime(){
		if(!function_exists('get_field')){
			return;
		}

		if( have_rows('cooking_time')){

			while(have_rows('cooking_time')){
				the_row();

				$hours = get_sub_field('hours');
				$minutes = get_sub_field('minutes');

				//eew
				if($minutes == null){
					printf('<div class="cooking-time-container">
								<div class="cooking-time-icon">
									<i class="far fa-clock"></i>
								</div>
								<div class="cooking-time-content">
									<p>%d %s</p>
								</div>
							</div>',
						$hours,
						__('hours', 'bootscore'),
					);
				} elseif($hours == null){
					printf('<div class="cooking-time-container">
								<div class="cooking-time-icon">
									<i class="far fa-clock"></i>
								</div>
								<div class="cooking-time-content">
									<span>%d %s</span>
								</div>
							</div>',
						$minutes,
						__('minutes', 'bootscore'),
					);
				} else {
					printf('<div class="cooking-time-container">
								<div class="cooking-time-icon">
									<i class="far fa-clock"></i>
								</div>
								<div class="cooking-time-content">
									<p>%d %s %d %s</p>
								</div>
							</div>',
						$hours,
						__('h', 'bootscore'),
						$minutes,
						__('min', 'bootscore'),
					);
				}
				
				
			}
		}
	}
}

// Cooking Time End

// Rating
if(!function_exists('bootscore_recipe_rating')){

	function bootscore_recipe_rating(){

		if(!function_exists('get_field')){
			return;
		}

		$rating = get_field('rating', false, false);

		
		if(!empty($rating)){
			if(strpos($rating, '.5') !== false){
				$halfstar = str_repeat('<i class="far fa-star"></i>', $rating) . '<i class="far fa-star-half"></i>';

				printf('<div class="rating-container">
						<div class="rating-icon">
							%s
						</div>
						<div class="rating-content">
							<p>%s</p>
						</div>
					</div>',
					$halfstar,
					__('Rating', 'bootscore'),
		
				);
			} else {

				printf('<div class="rating-container">
							<div class="rating-icon">
								%s
							</div>
							<div class="rating-content">
								<p>%s</p>
							</div>
						</div>',
						str_repeat('<i class="far fa-star"></i>', $rating),
						__('Rating', 'bootscore'),
			
				);
			}
		}
	}
}
// Rating End


// Preamble
if(!function_exists('bootscore_recipe_preamble')){

	function bootscore_recipe_preamble(){

		if(!function_exists('get_field')){
			return;
		}

		$preamble = get_field('preamble', false, false);

		
		if(!empty($preamble)){
			printf('<p>%s</p>',
					$preamble,
		);
		}
	}
}
// Preamble End