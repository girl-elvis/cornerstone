<?php the_content();



if (is_page('our-expertise')){ // PEOPLE PAGE
	echo "<div class='peoplesection'>";
	// For Postition peeps first
	$args = array( 'post_type' => 'person','nopaging' => true, 'post_per_page' => '-1', );
	$postslist = get_posts( $args );
	global $post;

	// LOOP FOR STAFF
	echo '<div id="staff" class="main"><ul id="og-grid" class="og-grid">';
	?>


	<?php

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		$field = get_fields($post->ID); 

	//print_r($field);
	  if (in_array("STAFF", $pos)) {
	      echo "<li ><a href=#";
	      echo " data-title='" . get_the_title() ."' ";
		echo " data-jobtitle='" . $field['jobtitle'] ."' ";
		echo " data-bio='" . addslashes($field['bio']) ."' ";

	      // Echo through repeater projects
	      if( get_field('experience') )
			{
				$i = 1;
				while( has_sub_field('experience') )
				{ 
					$name = get_sub_field('name');
					$desc = get_sub_field('description');
					echo " data-ex-name" . $i . "='" . addslashes($name) ."' ";
					echo " data-ex-desc" . $i . "='" . addslashes($desc) ."' ";
					$i++;
					
				}
			}

 




	      echo ">" .  get_the_post_thumbnail($post->ID,"portrait") ."</a>";




	     


	      echo "</li>"; 
	  }
	endforeach;  

	echo "</ul></div>";



	// LOOP FOR STAFF
	echo "<div id='board'><h2>BOARD:</h2><p>The Cornerstone Board is chaired by John McDonough, with six non-executive directors, both ordinary and preference shareholders.</p><ul>";

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		  if (in_array("BOARD", $pos)) {
		      echo "<li>" . get_the_title() . "</li>"; 
		  }
	endforeach;  

	echo "</ul></div>";

	wp_reset_postdata();
	echo "</div>";
 }




// <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<!-- Extra content for Expertise/People page is in functions.php -->