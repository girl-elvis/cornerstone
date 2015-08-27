<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container-fluid">
  <div class="logo"><a class="navbar-brand" title="<?php bloginfo('name'); ?>" rel="home" href="<?= esc_url(home_url('/')); ?>"><h1 class="offscreen"><?php bloginfo('name'); ?></h1></a></div>


<div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          
      
   
</div>

      <nav class="collapse navbar-collapse" role="navigation">
       <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
    </nav>

  </div>
</header>
