<article <?php post_class('col-sm-6'); ?>>
  <header>
   <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    
     <div class="entry-thumb"><?php the_post_thumbnail("medium", array( 'class' => 'dropshadow' )); ?> </div>


	<?php 
		echo "<div class='entry-meta'><dl>";
		if (is_post_type_archive( 'project' )) {			 // Meta for Project Post
			$project_fields  = array("client-landowner" );
		    $field = get_field_object("client-landowner");
		    echo '<dt>' . $field['label'] . '</dt><dd> ' . $field['value'] . '</dd>';
		    echo '<dt>Our Role</dt><dd> '. get_the_category_list() .'</dd>'; 		    
		} elseif (is_category( 'news' )) {					// Meta for News Post
			echo get_the_category_list(); 
			echo 'post';
		}
		echo "</dl></div>";
	?>
   
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
