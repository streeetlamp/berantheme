<div class="wrap container" role="document">
  <div class="content row">
    <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <div id="home-content" class="row">
            <div class="col-sm-8 home-copy">
              <?php the_content(); ?>
            </div>
            <div class="col-sm-4 track-record">
              <?php the_field('track_record'); ?>
              <a href="<?php the_field('record_link'); ?>">MORE ></a>
            </div>
          </div>
        <?php endwhile; ?>
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
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->