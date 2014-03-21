<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php if(get_field('google+' ) != ""): ?><a href="<?php the_field('google+'); ?>" class="social-icon"><i class="fa fa-google-plus"></i></a><?php endif; ?>
        <a href="feed/" class="social-icon"><i class="fa fa-rss"></i></a>
        <?php if(get_field('twitter' ) != ""): ?><a href="<?php the_field('twitter'); ?>" class="social-icon"><i class="fa fa-twitter"></i></a><?php endif; ?>
        <?php if(get_field('pinterest' ) != ""): ?><a href="<?php the_field('pinterest'); ?>" class="social-icon"><i class="fa fa-pinterest"></i></a><?php endif; ?>
        <?php if(get_field('facebook' ) != ""): ?><a href="<?php the_field('facebook'); ?>" class="social-icon"><i class="fa fa-facebook"></i></a><?php endif; ?>
        <div class="footer-logos">
          <?php if( get_field('footer_logos') ): ?>
            <img src="<?php the_field('footer_logos'); ?>" />
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-offset-1 col-md-7">
        <h5><?php echo get_bloginfo ( 'description' );  ?></h5>
        <div class="contact-info">
          <section class="address">
            <?php if(get_field('location' ) != ""): ?><span><?php the_field('location'); ?></span><span class="contact-divider"></span><?php endif; ?>
            <?php if(get_field('street_address' ) != ""): ?><span><?php the_field('street_address'); ?></span><span class="contact-divider"></span><?php endif; ?>
            <?php if(get_field('city_state' ) != ""): ?><span><?php the_field('city_state'); ?></span><?php endif; ?>
          </section>
          <section class="contact-numbers">
            <?php if(get_field('phone_number' ) != ""): ?><span class="scripty office">office:</span><span class="phone-number"> <?php the_field('phone_number'); ?></span><?php endif; ?>
            <?php if(get_field('fax_number' ) != ""): ?><span class="scripty fax">fax:</span><span class="fax-number"> <?php the_field('fax_number'); ?></span><?php endif; ?>
          </section>

        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<!--
<div id="mockupoverlay_slider"></div>
<div id="mockupoverlay_original"></div>

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.0/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" media="screen" />
<style type="text/css">
#mockupoverlay_slider {
  z-index: 999999999;
  font-size: .75em;
  position: fixed;
  width: 50px;
  top: 55px;
  right: 15px;
  opacity: .33;
}
#mockupoverlay_slider:hover { opacity: .66; }
#mockupoverlay_original {
  z-index: 9999999;
  position: absolute;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 100%;
  background: url('http://i.imgur.com/GydZQoY.jpg') top center no-repeat;
  opacity: 1;
  display: none;
}
</style>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">google.load("jquery", "1");  google.load("jqueryui", "1");</script>
<script type="text/javascript">
$(function() {
  $("#mockupoverlay_slider").slider({ step: 10, change: function(event, ui) {
    $("#mockupoverlay_original").css("height", $(document).height());
    mockup_opacity = $('#mockupoverlay_slider').slider('value')/100;
    if (mockup_opacity == 0) {
      $("#mockupoverlay_original").hide();
    } else {
      $("#mockupoverlay_original").show().css("opacity", mockup_opacity);
    }
  } });
});
</script>--!>