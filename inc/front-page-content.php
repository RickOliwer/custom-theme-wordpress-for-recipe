<?php

// front page preamble
if(!function_exists('bootscore_front_page_preamble')){

	function bootscore_front_page_preamble(){

		if(!function_exists('get_field')){
			return;
		}

		$preamble = get_field('front_page_preamble', false, false);

		
		if(!empty($preamble)){
			printf('<p>%s</p>',
					$preamble,
		);
		}
	}
}
// front page preamble End