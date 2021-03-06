<?php
/*
Template Name: Advice
*/
?>
<div id="container">
  <div class="row">
    <div id="content" role="main" class="col-md-8">
      <?php the_post(); ?>
      <h3 class="beran-headline"><?php the_title(); ?></h3>
      <?php the_content(); ?>
      <?php
      $args = array (
        'post_type'              => 'post',
      );

      $advicequery = new WP_Query( $args );

      if ( $advicequery->have_posts() ) {
        while ( $advicequery->have_posts() ) {
          $advicequery->the_post(); ?>
          <div class="advice-post">
            <?php
            if ( has_post_thumbnail() ) { ?>
              <a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('large', array( 'class'  => "img-responsive advice-img")); ?> </a>
            <?php }
            ?>
            <h4 class="brown-pagetitle advice-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php get_template_part('templates/entry-meta'); ?>
            <?php global $more; $more = 0; ?>
            <div class="advice-post-content"><?php the_content(''); ?></div>
          </div>
        <?php }
      } else { ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'roots'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php }

      // Restore original Post Data
      wp_reset_postdata(); ?>

      <?php if ($wp_query->max_num_pages > 1) : ?>
        <nav class="post-nav">
          <ul class="pager">
            <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
            <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
          </ul>
        </nav>
      <?php endif; ?>
    </div><!-- #content -->
    <div class="advice-sidebar col-md-4">
      <section class="advice-social">
        <span class="brown-pagetitle"><strong>Share:</strong></span>
        <a target="_blank" href="https://plus.google.com/share?url=<?php echo home_url('/advice') ?>" class="social-icon"><i class="fa fa-google-plus"></i></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?text=A blog dedicated to all things related to the nest&url=<?php echo home_url('/advice') ?>&via=TheBeranGroup" class="social-icon"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo home_url('/advice') ?>&description=A blog dedicated to all things related to the nest&media=<?php echo get_theme_mod( 'beran_logo_upload' ); ?>" class="social-icon"><i class="fa fa-pinterest"></i></a>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url('/advice') ?>" class="social-icon"><i class="fa fa-facebook"></i></a>
      </section>
      <h4 class="beran-headline">Subscribe</h4>
      <div class="newsletter-form">
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
      </div>
      <h4 class="beran-headline">Recent Posts</h4>
      <ul class="advice-recentposts">
        <?php
          $args = array( 'numberposts' => '3' );
          $recent_posts = wp_get_recent_posts( $args );
          foreach( $recent_posts as $recent ){
            echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
          }
          wp_reset_postdata();
        ?>
      </ul>
      <h4 class="beran-headline">Archives</h4>
      <ul class="archives-list list-unstyled">
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/birdnest.png" class="birdnest advice-nest">
      <?php
        $args = array(
          'posts_per_page' => 2,
          'orderby' => 'rand'
        );
        $random_post = new WP_Query($args);
        while ( $random_post->have_posts() ) {
        $random_post->the_post(); ?>
        <?php
          if ( has_post_thumbnail() ) { ?>
            <a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('medium', array( 'class'  => "img-responsive advice-img")); ?> </a>
          <?php }
        ?>
        <h4 class="brown-pagetitle advice-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php get_template_part('templates/entry-meta'); ?>
        <?php global $more; $more = 0; ?>
        <div class="advice-post-content"><?php the_content(''); ?></div>
       <?php }
       wp_reset_postdata();
      ?>
    </div>
  </div>
</div><!-- #container -->