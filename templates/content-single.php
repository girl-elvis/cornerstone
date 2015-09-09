<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php // get_template_part('templates/entry-meta'); ?>
    </header>

    <div class="project-meta col-sm-6" >
      <div class="entry-thumb"><?php the_post_thumbnail("large"); ?> </div>




    </div> <!-- end of project meta -->
    <div class="entry-content col-sm-6">
      <?php the_content(); ?>
    </div>
   
   

   
  </article>
  
  <div class="related col-sm-6"> <h3>More News here</h3>
        <footer>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </footer>
  </div>
<?php endwhile; ?>


