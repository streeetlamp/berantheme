<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php if ( get_theme_mod( 'beran_mobile_tagline_upload' ) ) : ?>
        <div class="beran-mobile-tagline visible-xs">
            <img src="<?php echo get_theme_mod( 'beran_mobile_tagline_upload' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </div>
        <?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-5 col-md-4 footer-social">
        <?php if(get_field('google+', 'option' ) != ""): ?><a href="<?php the_field('google+', 'option'); ?>" class="social-icon"><i class="fa fa-google-plus"></i></a><?php endif; ?>
        <a href="feed/" class="social-icon"><i class="fa fa-rss"></i></a>
        <?php if(get_field('twitter', 'option' ) != ""): ?><a href="<?php the_field('twitter', 'option'); ?>" class="social-icon"><i class="fa fa-twitter"></i></a><?php endif; ?>
        <?php if(get_field('pinterest', 'option' ) != ""): ?><a href="<?php the_field('pinterest', 'option'); ?>" class="social-icon"><i class="fa fa-pinterest"></i></a><?php endif; ?>
        <?php if(get_field('facebook', 'option' ) != ""): ?><a href="<?php the_field('facebook', 'option'); ?>" class="social-icon"><i class="fa fa-facebook"></i></a><?php endif; ?>
        <div class="footer-logos">
          <?php if( get_field('footer_logos', 'option') ): ?>
            <img src="<?php the_field('footer_logos', 'option'); ?>" />
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-7 col-md-8 footer-blogdesc">
        <h5><?php echo get_bloginfo('name'); ?>, <?php echo get_bloginfo ( 'description' );  ?></h5>
        <div class="contact-info">
          <section class="address">
            <?php if(get_field('location', 'option' ) != ""): ?><span><?php the_field('location', 'option'); ?></span><span class="contact-divider"></span><?php endif; ?>
            <?php if(get_field('street_address', 'option' ) != ""): ?><span><?php the_field('street_address', 'option'); ?></span><span class="contact-divider"></span><?php endif; ?>
            <?php if(get_field('city_state', 'option' ) != ""): ?><span><?php the_field('city_state', 'option'); ?></span><?php endif; ?>
          </section>
          <section class="row contact-numbers">
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
              <?php if(get_field('phone_number', 'option' ) != ""): ?><span class="scripty office">office:</span><span class="phone-number"> <?php the_field('phone_number', 'option'); ?></span><?php endif; ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8" style="padding-left:0;">
              <?php if(get_field('fax_number', 'option' ) != ""): ?><span class="scripty fax">fax:</span><span class="fax-number"> <?php the_field('fax_number', 'option'); ?></span><?php endif; ?>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>