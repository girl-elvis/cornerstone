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
// END SAGE STUFF ////////////////



/* HEADER  */

/* HOMEPAGE  */

// Add top section with menus to home page

function add_homemenu() {
 if(is_home() || is_front_page() ) {  
    echo "<div id='hometop'><div class='home-image'>" .  get_new_royalslider(1) . "</div>";
     if (has_nav_menu('question_menu')) {
       wp_nav_menu(['theme_location' => 'question_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'row', 'link_after'=> '<span class="glyphicon glyphicon-question-sign"></span>']); 
    } 
    if (has_nav_menu('sectors_menu')) {
       wp_nav_menu(['theme_location' => 'sectors_menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'row', 'link_after'=> '<span class="glyphicon glyphicon-triangle-right"></span>']);
    }
    echo "</div> <div class='homebottom row'><div class='homenews col-sm-6'><h2>Latest News</h2>";
  }     
}
add_action( 'loop_start', 'add_homemenu');


// Add close div (opened in add_homemenu function)

function close_homediv() {
 if(is_home() || is_front_page() ) { 
  echo "</div><div class='quote col-sm-6'><h1> QUOTE HERE </h1></div></div>";
  }

  else if (is_page('our-expertise')){ // PEOPLE PAGE

    // For Postition peeps first
    $args = array(
      'post_type' => 'person','nopaging' => true,
      'post_per_page' => '-1',
      // 'meta_query' => array(
      //    array(
      //       'key' => 'postition',
      //       'value'   => 'STAFF',
      //       'compare' => 'LIKE',
      //     )
      // )
   );
  $postslist = get_posts( $args );
  global $post;

  // LOOP FOR STAFF
  echo "<div id='staff'><ul>";

  foreach ( $postslist as $post ) :    
    setup_postdata( $post ); 
    $pos = get_post_meta($post->ID, 'postition', true);
      if (in_array("STAFF", $pos)) {
          echo "<li>" . get_the_title() . "</li>"; 
      }
  endforeach;  

  echo "</ul></div>";

  // LOOP FOR STAFF
  echo "<div id='board'><h2>BOARD:</h2><p>The Cornerstone Board is chaired by John McDonough, with six non-executive directors, both ordinary and preference shareholders.</p><ul>";

  foreach ( $postslist as $post ) :    
    setup_postdata( $post ); 
    $pos = get_post_meta($post->ID, 'postition', true);
      if (in_array("BOARD", $pos)) {
          echo "<li>" . get_the_title() . "</li>"; 
      }
  endforeach;  

  echo "</ul></div>";

  wp_reset_postdata();

  }
}
add_action( 'loop_end', 'close_homediv');



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

// Project CPT
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

// Person CPT for staff & board 
    add_action( 'init', 'register_cpt_person' );

    function register_cpt_person() {

        $labels = array( 
            'name' => _x( 'People', 'person' ),
            'singular_name' => _x( 'Person', 'person' ),
            'add_new' => _x( 'Add New', 'person' ),
            'add_new_item' => _x( 'Add New Person', 'person' ),
            'edit_item' => _x( 'Edit this Person', 'person' ),
            'new_item' => _x( 'New Person', 'person' ),
            'view_item' => _x( 'View this Person', 'person' ),
            'search_items' => _x( 'Search People', 'person' ),
            'not_found' => _x( 'No people found', 'person' ),
            'not_found_in_trash' => _x( 'No people found in Trash', 'person' ),
            'parent_item_colon' => _x( 'Parent:', 'person' ),
            'menu_name' => _x( 'People', 'person' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
            
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
             'menu_position' => 5,
            'menu_icon' => 'dashicons-groups',
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );

        register_post_type( 'person', $args );
    }


// ADD Project Taxonomy?