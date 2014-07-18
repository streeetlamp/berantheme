<?php
/**
 * Utility functions
 */
function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}

function is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}

function siblings($link) {
global $post;
$siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent.'&sort_column=menu_order');
foreach ($siblings as $key=>$sibling){
    if ($post->ID == $sibling->ID){
        $ID = $key;
    }
}

if( $ID == 0 ){
    $closest = array('before'=>get_permalink($siblings[count($siblings)-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));
}elseif( $ID == count($siblings)-1 ){
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[0]->ID));
}else{
    $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));
}

if ($link == 'before' || $link == 'after') { echo $closest[$link]; } else { return $closest; } }

function siblings_about($link) {
    global $post;
    $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent);
    foreach ($siblings as $key=>$sibling){
        if ($post->ID == $sibling->ID){
            $ID = $key;
        }
    }
if( $ID == count($siblings)-1 ){
    $closest = array('before'=> '<a href="'.get_permalink($siblings[$ID-1]->ID).'">'.get_the_title($siblings[$ID-1]->ID).'</a>','after'=> '<a href="'.get_permalink($siblings[0]->ID).'" class="advice-link">'.get_the_title($siblings[0]->ID).'</a>');
}else{
    $closest = array('before'=> '<a href="'.get_permalink($siblings[$ID-1]->ID).'">'.get_the_title($siblings[$ID-1]->ID).'</a>','after'=> '<a href="'.get_permalink($siblings[$ID+1]->ID).'" class="advice-link">'.get_the_title($siblings[$ID+1]->ID).'</a>');
}
    if ($link == 'before' || $link == 'after') { echo $closest[$link]; } else { return $closest; }
}