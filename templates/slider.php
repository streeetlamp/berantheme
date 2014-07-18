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
          <?php if( get_field('slide_link') ): ?><a href="<?php the_field('slide_link'); ?>"><?php endif; ?>
          <?php if( get_field('outside_link') ): ?><a href="<?php the_field('outside_link'); ?>"><?php endif; ?>
            <?php the_post_thumbnail('full', array('class' => 'rsImg')); ?>
          <?php if( get_field('outside_link') ): ?></a><?php endif; ?>
          <?php if( get_field('slide_link') ): ?></a><?php endif; ?>
        </div>
      <?php }
      // no posts found
    } wp_reset_postdata(); ?>
  </div>
</div>