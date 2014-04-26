<?php
/*
Template Name: Advice
*/
?>

<div id="container">
  <div class="row">
    <div id="content" role="main" class="col-md-7">
      <?php the_post(); ?>
      <h2 class="beran-headline"><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php
      $args = array (
        'post_type'              => 'post',
      );

      $advicequery = new WP_Query( $args );

      if ( $advicequery->have_posts() ) {
        while ( $advicequery->have_posts() ) {
          $advicequery->the_post(); ?>
          <div class="advice-post">
            <?php
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
              the_post_thumbnail('large', array( 'class'  => "img-responsive"));
            }
            ?>
            <h4 class="brown-pagetitle advice-title"><?php the_title(); ?></h4>
            <small class="advice-postedon">posted <?php the_time('l, F jS, Y') ?></small>
            <div class="advice-post-content"><?php the_content(); ?></div>
          </div>
        <?php }
      } else { ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'roots'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php }

      // Restore original Post Data
      wp_reset_postdata(); ?>

      <?php if ($wp_query->max_num_pages > 1) : ?>
        <nav class="post-nav">
          <ul class="pager">
            <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
            <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
          </ul>
        </nav>
      <?php endif; ?>
    </div><!-- #content -->
    <div class="col-md-5">
      <h4 class="beran-headline">Archives</h4>
      <ul class="archives-list list-unstyled">
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </div>
  </div>
</div><!-- #container -->