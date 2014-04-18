<div class="page-header col-sm-12">
  <h3>
    <?php if(get_field('page_header') != ""): ?>
      <?php the_field('page_header'); ?>
    <?php endif; ?>
  </h3>
  <?php if(get_field('page_subheader') != ""): ?>
    <h4>
      <?php the_field('page_subheader'); ?>
    </h4>
  <?php endif; ?>
</div>