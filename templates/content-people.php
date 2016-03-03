<?php 


	echo "<div class='peoplesection'>";
	// For Postition peeps first
	$args = array( 'post_type' => 'person','nopaging' => true, 'post_per_page' => '-1', 'position' => "staff" );
	$postslist = get_posts( $args );


	// LOOP FOR STAFF
	echo '<div id="staff" class="main"><ul id="og-grid" class="og-grid">';
	echo term_description(get_term_by('staff', 'board', 'position')->term_id , 'position') ;
	?>


	<?php

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		$field = get_fields($post->ID); 

	 
		echo "<li ><a href=''>";
	    echo get_the_post_thumbnail($post->ID,"portrait") ."</a>";
	    echo "<h2>" . get_the_title() . "</h2>";
		echo "<div class='hidden-bio' ><div class='bio' >";
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

	      echo "</li>"; 
	

	endforeach;  


	echo "<li class='full'>";

	// LOOP FOR Board
	$args = array( 'post_type' => 'person','nopaging' => true, 'post_per_page' => '-1', 'position' => "board" );
	$postslist = get_posts( $args );

	echo "<div id='board'>" .  term_description( get_term_by('slug', 'board', 'position')->term_id , 'position') . "</div>";

	echo "</li>";

	foreach ( $postslist as $post ) :    
		setup_postdata( $post ); 
		$pos = get_post_meta($post->ID, 'postition', true);
		$field = get_fields($post->ID); 

		
		   echo "<li ><a href=''>";
	    echo get_the_post_thumbnail($post->ID,"portrait") ."</a>";
	    echo "<h2>" . get_the_title() . "</h2>";
		echo "<div class='hidden-bio' ><div class='bio' >";
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

	      echo "</li>"; 

	endforeach;  

	echo "</ul></div>";

	wp_reset_postdata();

 


