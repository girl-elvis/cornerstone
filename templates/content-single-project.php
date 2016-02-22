<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('row'); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php // get_template_part('templates/entry-meta'); ?>
    </header>

    <div class="project-meta col-sm-6" >
      <div class="entry-thumb"><?php the_post_thumbnail("large"); ?> </div>


      <dl>
<?php
    
    $project_fields  = array("client-landowner" , "value" ,  "role", "client_website", "project_website" );

    foreach ($project_fields as $field){
      if ($field == "role"){
         echo '<dt>Our Role</dt><dd> '. get_the_category_list() .'</dd>'; 
      } else {
      $field = get_field_object($field);
        if ($field['value']){
          echo '<dt>' . $field['label'] . '</dt><dd> '  . $field['value'] . '</dd>';          
        }
      

      }
      
    }

?>
</dl>
<div class="testimonial quote">
  <blockquote>Donec fermentum vel erat at tincidunt. Aliquam egestas imperdiet erat</blockquote>
</div>
    </div> <!-- end of project meta -->
    <div class="entry-content col-sm-6">
      <?php the_content(); ?>
    </div>
   
   

   
  </article>
  
  <div class="related col-sm-6"> <h3>More Projects here</h3>
        <footer>
    <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
  </footer>
  </div>
  

<?php endwhile; ?>
