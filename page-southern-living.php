<div class="row">
  <div class="col-md-6">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
  <div class="col-xs-12 col-md-6">
    <?php the_post_thumbnail( 'full', array('class' => 'img-responsive')); ?>
  </div>
</div>
<?php if( get_field('full_width_1') ): ?>
  <img class="img-responsive" src="<?php the_field('full_width_1'); ?>" />
<?php endif; ?>
<?php if( get_field('full_width_2') ): ?>
  <img class="img-responsive" src="<?php the_field('full_width_2'); ?>" />
<?php endif; ?>

<?php if( get_field('floor_plan') ): ?>
  <div id="floorplan-img" style="background: url(<?php the_field('floor_plan'); ?>);">
    <img class="img-responsive" src="<?php the_field('floor_plan'); ?>" />
  </div>
<?php endif; ?>

<?php if( get_field('sponsor_logos') ): ?>
  <div class="sponsor-logos">
  <h4>THANKS TO OUR SPONSORS!</h4>
    <img class="img-responsive" src="<?php the_field('sponsor_logos'); ?>" />
  </div>
<?php endif; ?>