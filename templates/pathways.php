<div id="pathways">
  <div class="wrap container">
    <div class="content row">
      <?php
      $args = array (
        'post_type'              => 'featured-listing',
        'posts_per_page'         => '1',
      );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post(); ?>

            <div class="col-xs-12 col-sm-4 pathways-item">
              <?php the_post_thumbnail('full'); ?>
              <h4><?php echo roots_title(); ?></h4>
              <?php the_field('featured_listing_text'); ?>
              <a href="<?php the_permalink(); ?>">MORE ></a>
            </div>

        <?php }
      } wp_reset_postdata(); ?>

      <?php
      $args = array (
        'posts_per_page'         => '2',
        'meta_query'             => array(
          array(
            'key'       => 'feature_post',
            'value'     => '1',
            'compare'   => '=',
          ),
        ),
      );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post(); ?>
            <div class="col-xs-12 col-sm-4  pathways-item">
              <?php the_post_thumbnail('full'); ?>
              <h4><?php echo roots_title(); ?></h4>
              <?php the_field('featured_text'); ?>
              <a href="<?php the_permalink(); ?>">MORE ></a>
            </div>
        <?php }
      } wp_reset_postdata(); ?>
    </div>
  </div>
</div>