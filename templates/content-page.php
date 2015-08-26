<?php the_content();



if (is_page('our-expertise')){ // PEOPLE PAGE
	echo "<div class='peoplesection'>";
	// For Postition peeps first
	$args = array( 'post_type' => 'person','nopaging' => true, 'post_per_page' => '-1', );
	$postslist = get_posts( $args );
	global $post;

	// LOOP FOR STAFF
	echo "<div id='staff'><ul>";

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		$field = get_fields($post->ID); 
	//print_r($field);
	  if (in_array("STAFF", $pos)) {
	      echo "<li class='col-sm-5ths def'><a href=#>" .  get_the_post_thumbnail($post->ID,"portrait") ."</a>";
	      echo "<div class='expert'><div class='col-sm-6'><h1>" . get_the_title() . "</h1><h2>" . $field['jobtitle'] . "</h2>" ;
	      echo "<h2>Bio</h2><p>" .$field['bio'] . "</p><h2>Projects Worked On</h2>";
	      // Echo through repeater projects
	      if( get_field('experience') )
			{
				while( has_sub_field('experience') )
				{ 
					$name = get_sub_field('name');
					$desc = get_sub_field('description');
					echo "<h3>" . $name . "</h3><p>" . $desc . "</p>";
					// do something with sub field...
				}
			}
	      echo "</div><div class='col-sm-6'><h2>Example Case Study Text</h2>";
	      // echo through repeater CS projects
	      echo "</div></div></li>"; 
	  }
	endforeach;  

	echo "</ul></div>";
echo "<div class='displaystaff'></div>";


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