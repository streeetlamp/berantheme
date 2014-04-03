<div class="row">
  <div class="col-md-6">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
  <div class="col-md-6">
    <?php the_post_thumbnail( 'full' ); ?>
  </div>
</div>
<?php if ( is_page(81) ) : ?>

  <?php if( get_field('map_image') ): ?>
    <div id="sl-map" style="background: url(<?php the_field('map_image_highlight'); ?>);">
      <img src="<?php the_field('map_image'); ?>" />
    </div>
  <?php endif; ?>

  <?php if( get_field('residents_club') ): ?>
    <div id="residents-club">
      <img src="<?php the_field('residents_club'); ?>" />
    </div>
  <?php endif; ?>

  <?php if( get_field('floor_plan') ): ?>
    <div id="floorplan-img" style="background: url(<?php the_field('floor_plan'); ?>);">
      <img src="<?php the_field('floor_plan'); ?>" />
    </div>
  <?php endif; ?>

<?php endif; ?>

<?php $images = get_field('page_image_gallery');
  if( $images ): ?>
    <section class="page-gallery"><!-- page images -->
      <?php foreach( $images as $image ): ?>
        <div class="page-gallery-item">
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        </div>
      <?php endforeach; ?>
    </section><!-- project gallery -->
  <?php endif; ?>

<?php if ( is_page(81) ) : ?>

  <?php if( get_field('sponsor_logos') ): ?>
    <div class="sponsor-logos">
    <h4>THANKS TO OUR SPONSORS!</h4>
      <img src="<?php the_field('sponsor_logos'); ?>" />
    </div>
  <?php endif; ?>
<?php endif; ?>