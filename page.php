<div class="row">
  <div class="col-md-6">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
  <div class="col-xs-12 col-md-6">
    <?php the_post_thumbnail( 'full', array('class' => 'img-responsive')); ?>
    </div>
</div>