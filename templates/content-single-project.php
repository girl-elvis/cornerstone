<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php // get_template_part('templates/entry-meta'); ?>
    </header>

    <div class="project-meta col-sm-6" >
      <div class="entry-thumb"><?php the_post_thumbnail("thumbnail"); ?> </div>

<?php
    the_field( "client-landowner" ); 

the_field( "value" ); 
the_field( "our_role" ); 
the_field( "client_website" ); 
the_field( "project_website" );


?>
    </div>
    <div class="entry-conten col-sm-6">
      <?php the_content(); ?>
    </div>
    <div class="testemonial col-sm-6">
      <h1>"QUOTE TESTEMONIAL HERE"</h1>
    </div>
    <div class="related col-sm-6">
          <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    </div>


   
  </article>

<?php endwhile; ?>
