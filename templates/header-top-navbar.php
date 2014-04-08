<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="row navbar-branding">
      <div class="col-xs-12 col-sm-6">
        <?php if ( get_theme_mod( 'beran_logo_upload' ) ) : ?>
        <div class="beran-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'beran_logo_upload' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
        </div>
        <?php else : ?>
          <hgroup>
            <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
          </hgroup>
        <?php endif; ?>
      </div>
      <div class="col-sm-6 visible-md visible-lg">
        <?php if ( get_theme_mod( 'beran_tagline_upload' ) ) : ?>
        <div class="beran-tagline">
            <img src="<?php echo get_theme_mod( 'beran_tagline_upload' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>