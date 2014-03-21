<div class="wrap container" role="document">
  <div class="content row">
    <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <div id="home-content" class="row">
            <div class="col-md-8 home-copy">
              <?php the_content(); ?>
            </div>
            <div class="col-md-4 track-record">
              <?php the_field('track_record'); ?>
              <a href="<?php the_field('record_link'); ?>">MORE ></a>
            </div>
          </div>
        <?php endwhile; ?>
        <div id="social-feed" class="row">
          <div class="col-md-8">
            <?php get_template_part('templates/fb-feed'); ?>
          </div>
          <div class="col-md-4">
            <h4>Sign up for up-to-the-minute listings, news and advice.</h4>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Enter Email Address">
              <span class="glyphicon glyphicon-chevron-right form-control-feedback"></span>
            </div>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/birdnest.png" class="birdnest">
          </div>
        </div>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->