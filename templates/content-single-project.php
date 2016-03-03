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

<?php if (get_field('quote')){  ?>

<div class="testimonial quote">
  <blockquote> <?php the_field('quote') ; ?> </blockquote>
</div>

<?php } ?>





    </div> <!-- end of project meta -->
    <div class="entry-content col-sm-6">
      <?php the_content(); ?>
    </div>
   
   

   
  </article>
  

  

<?php endwhile; ?>
