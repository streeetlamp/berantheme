<div class="slider-wrapper">
  <div id="beranSlider" class="royalSlider rsDefault">
    <?php
    $args = array (
      'post_type'              => 'slide',
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post(); ?>
        <div>
          <?php the_post_thumbnail('full', array('class' => 'rsImg')); ?>
        </div>
      <?php }
      // no posts found
    } wp_reset_postdata(); ?>
  </div>
</div>