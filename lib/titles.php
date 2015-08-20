<?php

namespace Roots\Sage\Titles;

/**
 * Page titles
 */
function title() {
  if (is_home()) {
    
      return __('Home', 'sage');
    
  } elseif (is_archive()) {
    if ( is_post_type_archive() ) {
        $title = sprintf( __( '%s' ), post_type_archive_title( '', false ) );
        return $title;
    } elseif (is_category() ) {
      $title = sprintf( __( '%s' ), single_term_title( '', false ) );
        return $title;
    }else {
      return get_the_archive_title();
    }
    
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } elseif (is_front_page()){
    
  } else {
    return get_the_title();
  }
}
