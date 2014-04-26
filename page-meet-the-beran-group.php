<div class="row">
  <div class="col-md-12">
    <h3 class="beran-headline">WE ARE:</h3>
  </div>
  <div class="col-md-6">
    <?php if( have_rows('team_members_left') ): ?>
      <div class="row">
        <?php while( have_rows('team_members_left') ): the_row(); ?>
        <div class="col-sm-4 col-md-6">
          <img class="img-responsive" src="<?php the_sub_field('member_photo'); ?>" />
        </div>
        <div class="col-sm-8 col-md-6">
          <h4 class="brown-pagetitle member-name"><?php the_sub_field('member_name'); ?></h4>
          <em class="member-script member-title"><?php the_sub_field('member_title'); ?></em>
          <p class="member-email"><?php the_sub_field('member_email'); ?></p>
          <?php if( get_sub_field('member_phone') ): ?><em class="member-script">phone:</em><?php endif; ?> <span class="member-phone"><strong><?php the_sub_field('member_phone'); ?></strong></span>
        </div>
        <div class="col-xs-12">
          <p class="member-bio"><?php the_sub_field('member_bio'); ?></p>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="col-md-6">
    <?php if( have_rows('team_members_right') ): ?>
      <div class="row">
        <?php while( have_rows('team_members_right') ): the_row(); ?>
        <div class="col-sm-4 col-md-6">
          <img class="img-responsive" src="<?php the_sub_field('member_photo'); ?>" />
        </div>
        <div class="col-sm-8 col-md-6">
          <h4 class="brown-pagetitle member-name"><?php the_sub_field('member_name'); ?></h4>
          <em class="member-script member-title"><?php the_sub_field('member_title'); ?></em>
          <p class="member-email"><?php the_sub_field('member_email'); ?></p>
          <?php if( get_sub_field('member_phone') ): ?><em class="member-script">phone:</em><?php endif; ?> <span class="member-phone"><strong><?php the_sub_field('member_phone'); ?></strong></span>
        </div>
        <div class="col-xs-12">
          <p class="member-bio"><?php the_sub_field('member_bio'); ?></p>
        </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>