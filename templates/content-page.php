<?php the_content();



if (is_page('our-expertise')){ // PEOPLE PAGE
	  get_template_part('templates/content', 'people'); 
 } elseif (is_page('our-partners')){
 	get_template_part('templates/content', 'partners'); 

 }



