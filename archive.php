<?php 
emf_add_about_menu(); // Calls function in functions.php for menu
get_template_part('templates/page', 'header'); ?>



<?php 

if(is_category()){
  $tax = $wp_query->get_queried_object(); 
  if(get_field('case_study_description',$tax ))
  {
      echo "<div class='category-desc'>" . get_field('case_study_description', $tax ) . "</div>";
  }


}



?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="loop row">
<?php while (have_posts()) : the_post(); ?>

  <?php 
 
  	get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

  
   ?>
<?php endwhile; ?>

</div>

