<div class="row">
  <div class="col-md-12">
    <?php the_post(); ?>
    <h3 class="beran-headline"><?php the_title(); ?></h3>
    <?php the_content(); ?>
  </div>
  <div class="col-md-6">
    <?php gravity_form('1', $display_title=false); ?>
  </div>
    <?php
    if ( has_post_thumbnail() ) { ?>
      <?php the_post_thumbnail('large', array( 'class'  => "img-responsive")); ?>
    <?php } ?>
  <div class="col-md-6">

</div>