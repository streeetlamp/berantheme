<div id="pathways">
  <div class="wrap container">
    <div class="content row">
      <?php
      $args = array (
        'post_type'              => 'pathway',
        'posts_per_page'         => '3',
      );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post(); ?>

            <div class="col-xs-12 col-sm-4 pathways-item">
              <?php the_post_thumbnail('full'); ?>
              <h4><?php echo roots_title(); ?></h4>
              <?php the_content(); ?>
              <a href="<?php the_field('pathways_link'); ?>">MORE ></a>
            </div>

        <?php }
      } wp_reset_postdata(); ?>

    </div>
  </div>
</div>