<div class="page-header">
  <h3>
    <?php if(get_field('page_header') != ""): ?>
      <?php the_field('page_header'); ?>
    <?php else: ?>
      <?php echo roots_title(); ?>
    <?php endif; ?>
  </h3>
  <?php if(get_field('page_subheader') != ""): ?>
    <h4>
      <?php the_field('page_subheader'); ?>
    </h4>
  <?php endif; ?>
</div>