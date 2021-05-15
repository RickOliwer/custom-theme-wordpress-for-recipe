<?php

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