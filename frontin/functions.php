<?php

function frontin_clean_code( $input )
{
    $encoded = preg_replace_callback( '/<code>(.*?)<\/code>/ims', create_function( '$matches', '$matches[1] = preg_replace(
	        array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "",
	        $matches[1]);
          return "<code>" . htmlentities($matches[1], ENT_QUOTES, "UTF-8") . "</code>";' ), $input );
    
    return ( $encoded ) 
           ? $encoded 
           : $input;
}

function frontin_get_archives( $type = false )
{
    $args = array(
        'type' => $type,
        'format' => 'html',
        'show_post_count' => true,
        'echo' => 0 
    );
    
    $archives = wp_get_archives( $args );
    $archives = explode( '</li>', $archives );
    $data     = array();
    
    foreach ( $archives as $currentData ) {
        $currentData = str_replace( array(
            '<li>',
            "\n",
            "\t",
            "\s" 
        ), '', $currentData );
        
        if ( $currentData === '' ) {
            continue;
        }
        
        $a      = explode( "'", $currentData );
        $data[] = (object) array(
            'href' => trim( $a[ 1 ] ),
            'title' => trim( $a[ 3 ] ) 
        );
    }
    
    return (object) $data;
}

function frontin_get_categories( $order )
{
    $args = array(
        'orderby' => 'name',
        'order' => $order 
    );
    
    $categories = get_categories( $args );
    $data       = array();
    
    foreach ( $categories as $category ) {
        $data[] = (object) array(
             'href' => get_category_link( $category->term_id ),
            'title' => $category->name 
        );
    }
    
    return (object) $data;
}

function frontin_get_posts( $number, $postStatus, $order, $category = false )
{
    $args = array(
        'numberposts' => $number,
        'orderby' => 'post_date',
        'order' => $order,
        'post_status' => $postStatus,
        'category' => $category 
    );
    
    return get_posts( $args );
}

/**
 * Inspired by Till Krüss
 * Credits where it's due:
 * http://tillkruess.com/projects/wordpress/wp-beautifier/
 * Check @tillkruess 
 */
function frontin_minify( $input )
{
    // Save indent of specific tags
    $keepIndent = 'pre, textarea';
    $ignored    = '~';
    $safeTags   = explode( ', ', $keepIndent );
    for ( $i = 0, $size = count( $safeTags ); $i < $size; ++$i ) {
        $ignored .= '<' . $safeTags[ $i ] . '[^>]*>.*?<\/' . $safeTags[ $i ] . '>' . ( $i < $size - 1 ? '|' : '' );
    }
    $ignored .= '~s';
    preg_match_all( $ignored, $input, $safeTagsContent );
    
    // Minify
    $input = preg_replace( '~</div>~ms', "\n</div>", $input );
    $input = preg_replace( '~<div~ms', "\n<div", $input );
    $input = preg_replace( '~\r\n~ms', "\n", $input );
    $input = preg_replace( '~\r~ms', "\n", $input );
    $input = preg_replace( '~^\s+~s', '', $input );
    $input = preg_replace( '~\s+$~s', '', $input );
    $input = preg_replace( '~^\s+~m', '', $input );
    $input = preg_replace( '~\s+$~m', '', $input );
    $input = preg_replace( '~\n\s*(?=\n)~ms', '', $input );
    $input = preg_replace( '~([^>\s])(\s+)([^<\s])~', '$1 $3', $input );
    $input = preg_replace( '~(?:(?<=\>)|(?<=\/\>))\t+(?=\<\/?)~', '', $input );
    $input = preg_replace( '~\n~ms', "", $input );
    
    // Restore indent for specific tags
    preg_match_all( $ignored, $input, $modifiedTags );
    foreach ( $modifiedTags[ 0 ] as $key => $match ) {
        $input = str_replace( $match, $safeTagsContent[ 0 ][ $key ], $input );
    }
    
    // Remove comments (but leaves conditional comments untouched)
    return preg_replace( '~<!--(?![\s]?\[if)(.|\s)*?-->~i', '', $input );
    
    // Done
    return $input;
}


?> 
