
<?php 

if (has_nav_menu('question_menu')) :
        wp_nav_menu(['theme_location' => 'question_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav row']);
endif;
if (has_nav_menu('sectors_menu')) :
        wp_nav_menu(['theme_location' => 'sectors_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav row']);
endif;


 ?>

<?php //the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
