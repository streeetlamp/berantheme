<?php while (have_posts()) : the_post(); ?>
<div id="content" role="main" class="col-md-8">
  <article <?php post_class(); ?>>
    <header>
      <h3 class="beran-headline"><?php the_title(); ?></h3>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content advice-post">
      <?php
        if ( has_post_thumbnail() ) { ?>
          <a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('large', array( 'class'  => "img-responsive advice-img")); ?> </a>
        <?php }
      ?>
      <?php the_content(); ?>
      <section class="advice-social">
        <span class="brown-pagetitle"><strong>Share:</strong></span>
        <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="social-icon"><i class="fa fa-google-plus"></i></a>
        <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo get_permalink(); ?>&via=TheBeranGroup" class="social-icon"><i class="fa fa-twitter"></i></a>
        <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=<?php the_title(); ?>&media=<?php echo get_theme_mod( 'beran_logo_upload' ); ?>" class="social-icon"><i class="fa fa-pinterest"></i></a>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" class="social-icon"><i class="fa fa-facebook"></i></a>
      </section>
      <?php next_post('% ',
      'Next Entry: ', 'yes'); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
</div>
<div class="advice-sidebar col-md-4">
  <section class="advice-social visible-lg visible-md">
    <span class="brown-pagetitle"><strong>Share:</strong></span>
    <a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="social-icon"><i class="fa fa-google-plus"></i></a>
    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php echo get_permalink(); ?>&via=TheBeranGroup" class="social-icon"><i class="fa fa-twitter"></i></a>
    <a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&description=<?php the_title(); ?>&media=<?php echo get_theme_mod( 'beran_logo_upload' ); ?>" class="social-icon"><i class="fa fa-pinterest"></i></a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" class="social-icon"><i class="fa fa-facebook"></i></a>
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
      } ?>
  </ul>
  <h4 class="beran-headline">Archives</h4>
  <ul class="archives-list list-unstyled">
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/birdnest.png" class="birdnest">
</div>
<?php endwhile; ?>
