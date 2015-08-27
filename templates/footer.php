<footer class="content-info" role="contentinfo">
  <div class="container-fluid">
    <?php   if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(['theme_location' => 'footer_navigation',  'menu_class' => 'nav']);
      endif; ?>

  </div>
</footer>
