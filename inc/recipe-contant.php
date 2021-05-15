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
								<img src="<?= $image['url']; ?>" class="carousel_image">
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