<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
  'lib/wp_bootstrap_navwalker.php', // bootstrap nav walker
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



/* HEADER  */

/* HOMEPAGE  */

// Add menu to home page
function add_homemenu() {
 if(is_home() || is_front_page() ) {  

    echo "<div id='hometop'><div class='home-image'>Homepage Slider Here</div>";
     if (has_nav_menu('question_menu')) {
     wp_nav_menu(['theme_location' => 'question_menu', "container" => "div", 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'row', 'link_after'=> '<span class="glyphicon glyphicon-question-sign"></span>']); 
    } 
    if (has_nav_menu('sectors_menu')) {
     wp_nav_menu(['theme_location' => 'sectors_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'row', 'link_after'=> '<span class="glyphicon glyphicon-triangle-right"></span>']);
    }
    echo "</div><div class='homebottom'><h2> Latest News</h2>";
  }   

  
}
add_action( 'loop_start', 'add_homemenu');

// Add classes to home page menus

function special_nav_class($classes, $item){
    $menu_locations = get_nav_menu_locations();
    if ( has_term($menu_locations['question_menu'], 'nav_menu', $item)  ) {
       $classes[] = "col-sm-3";
        if (0 == $item->menu_item_parent) { //makes sure not added to sub-menus
          
       }
     } else if (has_term($menu_locations['sectors_menu'], 'nav_menu', $item)) {
        if (0 == $item->menu_item_parent) { //makes sure not added to sub-menus
           $classes[] = "col-sm-4";
       }
     }
     return $classes;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 90 , 2);

// Add close div (opened in add_homemenu function)
function add_homediv() {
 if(is_home() || is_front_page() ) { 
  echo "<div class='quote'><h1> QUOTE HERE </h1></div></div>";
  }
}
add_action( 'loop_end', 'add_homediv');


// filter so only 2 news posts
function hwl_home_pagesize( $query ) {
if ( is_home() ) {
        // Display only 2 post for homepage news
        $query->set( 'posts_per_page', 2 );
        return;
    }
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );


// CUSTOM POST TYPE  


add_action( 'init', 'register_cpt_project' );

function register_cpt_project() {

    $labels = array( 
        'name' => _x( 'Projects', 'project' ),
        'singular_name' => _x( 'Project', 'project' ),
        'add_new' => _x( 'Add New', 'project' ),
        'add_new_item' => _x( 'Add New Project', 'project' ),
        'edit_item' => _x( 'Edit Project', 'project' ),
        'new_item' => _x( 'New Project', 'project' ),
        'view_item' => _x( 'View Project', 'project' ),
        'search_items' => _x( 'Search Projects', 'project' ),
        'not_found' => _x( 'No projects found', 'project' ),
        'not_found_in_trash' => _x( 'No projects found in Trash', 'project' ),
        'parent_item_colon' => _x( 'Parent Project:', 'project' ),
        'menu_name' => _x( 'Projects', 'project' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-building',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'project', $args );
}