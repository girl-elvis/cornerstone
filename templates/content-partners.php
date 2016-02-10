<?php 




?>

<div class='partners'>

	<?php

	      // Echo through repeater projects

	      if( get_field('partners') )
			{
				
				while( has_sub_field('partners') )
				{ 
					echo "<div class='col-sm-6'>";
					$name = get_sub_field('partner_name');
					$desc = get_sub_field('partner_description');
					$logo =  get_sub_field('partner_image_or_logo');
					$link = get_sub_field('partner_link');

					if( $logo ) {
						echo wp_get_attachment_image( $logo, "partner" );
					}

					echo ("<h2>" . $name . "</h2>");

					if( $link ) {
						echo ("<p>" . $link . "</p>");
					}

					echo ("<p>" . $desc . "</p></div>");
					
					
				}
			}

 
?>

</div>

