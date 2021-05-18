<?php

// Servings (not done)
if(!function_exists('bootscore_recipe_servings')){
	function bootscore_recipe_servings(){
		$servings = get_field('servings', false, false);

		if(!empty($servings)) {

			printf('<h4 class="ingredients-header">%s</h4>',
			__('Ingredients', 'bootscore'),
			);

			echo '<div class="servings">';
			if($servings == 2){

				printf('
						<div class="custom-selecter">
							<i class="fas fa-user-friends fa-lg"></i>
							<select id="servings">
								<option value="2" selected>2</option>
								<option value="4">4</option>
								<option value="8">8</option>
								<option value="10">10</option>
							</select>
							<span class="custom-arrow"></span>
						</div>',
						
	
				);
			} elseif ($servings == 4){
				printf('
						<div class="custom-selecter">
							<i class="fas fa-user-friends fa-lg"></i>
							<select id="servings">
								<option value="2" >2</option>
								<option value="4" selected>4</option>
								<option value="8">8</option>
								<option value="10">10</option>
							</select>
							<span class="custom-arrow"></span>
						</div>',
						
	
				);
			} elseif($servings == 8){
				printf('
					<div class="custom-selecter">
						<i class="fas fa-user-friends fa-lg"></i>
						<select id="servings">
							<option value="2">2</option>
							<option value="4">4</option>
							<option value="8" selected>8</option>
							<option value="10">10</option>
						</select>
						<span class="custom-arrow"></span>
					</div>',
				

				);
			} else {
				printf('
					<div class="custom-selecter">
						<i class="fas fa-user-friends fa-lg"></i>
						<select id="servings">
							<option value="2">2</option>
							<option value="4">4</option>
							<option value="8" >8</option>
							<option value="10" selected>10</option>
						</select>
						<span class="custom-arrow"></span>
					</div>',
			

				);
			}
			echo '</div>';
		}
	}
}
//Servings End

//Ingredients
if(!function_exists('bootscore_recipe_ingredient')) {
	function bootscore_recipe_ingredient(){
		if(!function_exists('get_field')){
			return;
		}
		if ( have_rows('ingredients')){

			// printf('<h4 class="ingredients-header">%s</h4>',
			// __('Ingredients', 'bootscore'),
			// );

			// echo '<div class="servings">';

			// echo '
			// 	<div class="custom-selecter">
			// 		<i class="fas fa-user-friends fa-lg"></i>
			// 		<select id="servings">
			// 			<option value="2"selected>2</option>
			// 			<option value="4">4</option>
			// 			<option value="6">6</option>
			// 			<option value="8">8</option>
			// 		</select>
			// 		<span class="custom-arrow"></span>
			// 	</div>
			// 	';
			// echo '</div>';

			while(have_rows('ingredients')){
				the_row();

				$amount = get_sub_field('amount');
				$measurement = get_sub_field('measurement');
				$ingredient = get_sub_field('ingredient');
				$servings = get_field('servings', false, false);
				$amounts = $amount / $servings;

			
				printf('<div class="ingredient-card">
							<div class="inner-card-left">
								<div class="value-amount" data-baseValue="%f">
									<span></span>
								</div>
								<div class="measurement">
									<span>%s</span>
								</div>
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

