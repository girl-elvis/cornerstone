<?php 


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

	  if (in_array("STAFF", $pos)) {
		echo "<li ><a href=''>";
	    echo get_the_post_thumbnail($post->ID,"portrait") ."</a>";
	    echo "<h2>" . get_the_title() . "</h2>";
		echo "<div class='hidden-bio' ><div class='bio col-md-6' >";
	    echo "<h1>" .  get_the_title()   . "</h1>";	 // Name  
	   	echo "<h3>" .  $field['jobtitle']   . "</h3>";	// Job Title
	   	echo "<p>" . addslashes($field['bio']) . "</p>";

	      // Echo through repeater 'experience' fields
	      if( get_field('experience') )
			{
				while( has_sub_field('experience') )
				{ 
					$name = get_sub_field('name');
					$desc = get_sub_field('description');
					echo "<h3>". addslashes($name) . "</h3>";
					echo "<p>" . addslashes($desc) . "</p>";					
				}
			}
		echo "</div><div class='csprojects col-md-6'>";
			// Echo through Cornerston Projects
			$csprojects = get_field('cornerstone_project');
			if( $csprojects ): 
				 foreach( $csprojects as $csproject ): 
					$csp_link = get_permalink( $csproject->ID ); 
					$csp_title = get_the_title( $csproject->ID ); 
					echo "<h1><a href='" . addslashes($csp_link) . "'>" . addslashes($csp_title) . "</a></h1>";
				 endforeach; 
			endif; 


	      echo "</li>"; 
	  } // End if

	endforeach;  


	echo "<li class='full'>";

	// LOOP FOR STAFF
	echo "<div id='board'><h2>BOARD:</h2><p>The Cornerstone Board is chaired by John McDonough, with six non-executive directors, both ordinary and preference shareholders.</p>";

	echo "</li>";

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		  if (in_array("BOARD", $pos)) {
		   echo "<li ><a href=''>";
	    echo get_the_post_thumbnail($post->ID,"portrait") ."</a>";
	    echo "<h2>" . get_the_title() . "</h2>";
		echo "<div class='hidden-bio' ><div class='bio col-md-6' >";
	    echo "<h1>" .  get_the_title()   . "</h1>";	 // Name  
	   	echo "<h3>" .  $field['jobtitle']   . "</h3>";	// Job Title
	   	echo "<p>" . addslashes($field['bio']) . "</p>";

	      // Echo through repeater 'experience' fields
	      if( get_field('experience') )
			{
				while( has_sub_field('experience') )
				{ 
					$name = get_sub_field('name');
					$desc = get_sub_field('description');
					echo "<h3>". addslashes($name) . "</h3>";
					echo "<p>" . addslashes($desc) . "</p>";					
				}
			}
		echo "</div><div class='csprojects col-md-6'>";
			// Echo through Cornerston Projects
			$csprojects = get_field('cornerstone_project');
			if( $csprojects ): 
				 foreach( $csprojects as $csproject ): 
					$csp_link = get_permalink( $csproject->ID ); 
					$csp_title = get_the_title( $csproject->ID ); 
					echo "<h1><a href='" . addslashes($csp_link) . "'>" . addslashes($csp_title) . "</a></h1>";
				 endforeach; 
			endif; 


	      echo "</li>"; 
	  } // End if
	endforeach;  

	echo "</ul></div>";

	wp_reset_postdata();

 


