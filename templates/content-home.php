<article <?php post_class(); ?>>
  <header>
  	<div class="entry-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("thumbnail" , array( 'class'=> "dropshadow")); ?></a></div>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
 
  </header>

</article>
