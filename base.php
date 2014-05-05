<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <?php if ( is_front_page() ) : ?>
      <?php get_template_part('templates/slider'); ?>
      <?php get_template_part('templates/pathways'); ?>
      <?php get_template_part('templates/content-home'); ?>
  <?php else : ?>

  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php endif; ?>

  <?php if ( $post->post_parent == '457' ) : ?>
    <?php if( get_field('new_homes_img') ): ?>
    <div class="newhomes-wrap">
      <a href="<?php siblings('before'); ?>" class="prev-builder builder-nav"></a>
      <a href="<?php siblings('after'); ?>" class="next-builder builder-nav"></a>
      <div class="wrap container">
        <div class="content row">
          <div class="col-xs-12">
            <img class="img-responsive" src="<?php the_field('new_homes_img'); ?>" />
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <?php endif; ?>
  <?php if ( is_page('building-advice') ) : ?>
  <div class="buildingadvice-wrap">
    <div class="wrap container">
      <div class="content row">
        <div class="col-xs-12 col-md-6 col-md-offset-6">
          <a href="<?php the_field('building_advice_link'); ?>" class="advice-link">BUILDERS WE PROUDLY REPRESENT</a>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if ( is_page('contact') ) : ?>
  <div class="advice-footer">
    <div class="container">
      <div id="social-feed" class="row">
        <div class="col-sm-12 col-md-8">
          <?php get_template_part('templates/fb-feed'); ?>
          <?php echo do_shortcode("[facebook-feed]"); ?>
        </div>
        <div class="col-md-4 col-sm-12 newsletter-form">
          <h4>Sign up for up-to-the-minute listings, news and advice.</h4>
            <div id="mc_embed_signup">
              <form action="http://theberangroup.us8.list-manage.com/subscribe/post?u=cc81e067058b767efb1fb26be&amp;id=e39baaebbb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form-inline" target="_blank" role="form">
                <div class="form-group">
                  <input id="mce-EMAIL" type="email" class="form-control required email" name="EMAIL" placeholder="Enter Email Address">
                  <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                  </div>
                </div>
                <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-newsletter"><span class="glyphicon glyphicon-chevron-right"></span></button>
                <div style="position: absolute; left: -5000px;"><input type="text" name="b_cc81e067058b767efb1fb26be_e39baaebbb" value=""></div>
              </form>
            </div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/birdnest.png" class="birdnest">
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
