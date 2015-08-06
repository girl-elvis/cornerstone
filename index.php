<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>

  <?php 
  if (is_home() || is_front_page()){
  	get_template_part('templates/content-home');
  } else {
  	get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format());

  }
   ?>
<?php endwhile; ?>



<?php  (is_home() == FALSE) ? the_posts_navigation() : NOTHING ; //if not homepage, print the 'more posts' link ?>
