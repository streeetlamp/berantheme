<div class="row">
  <div class="col-md-12">
    <?php the_post(); ?>
    <h3 class="beran-headline"><?php the_title(); ?></h3>
    <?php the_content(); ?>
  </div>
  <div class="col-md-6">
    <?php gravity_form('1', $display_title=false); ?>
  </div>
  <div class="col-md-6">
    <h4 class="brown-pagetitle contact-name"><?php echo get_bloginfo('name'); ?></h4>
    <em class="scripty"><?php echo get_bloginfo ( 'description' );  ?></em><br>
    <?php if(get_field('location', 'option' ) != ""): ?><span><?php the_field('location', 'option'); ?></span><br><?php endif; ?>
    <?php if(get_field('street_address', 'option' ) != ""): ?><span><?php the_field('street_address', 'option'); ?></span><?php endif; ?>
    <?php if(get_field('city_state', 'option' ) != ""): ?><span><?php the_field('city_state', 'option'); ?></span><?php endif; ?>
    <?php if(get_field('info_email', 'option' ) != ""): ?><a href="mailto:<?php the_field('info_email', 'option'); ?>"><?php the_field('info_email', 'option'); ?></a><?php endif; ?>
    <?php if(get_field('phone_number', 'option' ) != ""): ?><br><span class="scripty office">office:</span><span class="beran-headline"> <strong><?php the_field('phone_number', 'option'); ?></strong></span><?php endif; ?>
    <?php if(get_field('fax_number', 'option' ) != ""): ?><br><span class="scripty fax">fax:</span><span class="fax-number beran-headline"> <strong><?php the_field('fax_number', 'option'); ?></strong></span><?php endif; ?>
    <?php
    if ( has_post_thumbnail() ) { ?>
      <?php the_post_thumbnail('large', array( 'class'  => "img-responsive")); ?>
    <?php } ?>
  </div>

</div>