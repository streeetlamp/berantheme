<div class="slider-wrapper">
  <div id="beranSlider" class="royalSlider rsDefault">
  <?php
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query('post_type=slide'); ?>
  <?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
    <div>
      <?php the_post_thumbnail('full', array('class' => 'rsImg')); ?>
    </div>
  <?php endwhile;?>
  <?php $wp_query = null; $wp_query = $temp;?>
  <?php wp_reset_query(); ?>
  </div>
</div>