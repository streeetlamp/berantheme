<div class="row">
  <div class="col-md-6">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
  <div class="col-xs-12 col-md-6">
    <?php the_post_thumbnail( 'full', array('class' => 'img-responsive')); ?>
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=670325379698989";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="sl-facebook">
          <h4>BE SOCIAL</h4>
          <div class="fb-like" data-href="https://www.facebook.com/events/670655459663770/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
        </div>
        <ul class="sl-map-list visible-lg visible-md">
          <li class="highlight-item">lot 5 is the <em>southern living</em> custom builder program showcase home <a class="highlight-click" href="#">(click to highlight)</a></li>
          <li class="residentsclub-item">The residents club — opening in 2014 <a class="residents-click" href="#residents-club">(click to view)</a></li>
          <li class="future-item">future development</li>
        </ul>
    </div>
</div>

<?php if( get_field('map_image') ): ?>
  <div id="sl-map" class="hidden-xs hidden-sm hidden-md" style="background: url(<?php the_field('map_image_highlight'); ?>);">
    <img class="img-responsive" src="<?php the_field('map_image'); ?>" />
  </div>
<?php endif; ?>

<?php if( get_field('residents_club') ): ?>
  <div id="residents-club" class="hidden-xs hidden-sm hidden-md">
    <img class="img-responsive" src="<?php the_field('residents_club'); ?>" />
  </div>
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