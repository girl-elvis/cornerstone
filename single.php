<?php  if (is_front_page() ) {
  	echo "home";}

  	get_template_part('templates/content-single', get_post_type()); ?>
