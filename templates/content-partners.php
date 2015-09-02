<?php 




?>

<div class='partners'>

	<?php

	      // Echo through repeater projects

	      if( get_field('partners') )
			{
				
				while( has_sub_field('partners') )
				{ 
					$name = get_sub_field('partner_name');
					$desc = get_sub_field('partner_description');
					$logo =  get_sub_field('partner_image_or_logo');
					$link = get_sub_field('partner_link');
					echo ("<img src=" . $logo . " alt='". $name ."-logo'/>");
					echo ("<h2>" . $name . "</h2>");
					echo ("<p>" . $link . "</p>");
					echo ("<p>" . $desc . "</p>");
					
					
				}
			}

 
?>

</div>

