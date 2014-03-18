<div class="wrap container" role="document">
  <div class="content row">
    <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php while (have_posts()) : the_post(); ?>
          <div id="home-content" class="row">
            <div class="col-md-8 home-copy">
              <?php the_content(); ?>
            </div>
            <div class="col-md-4">

            </div>
          </div>
        <?php endwhile; ?>
    </main><!-- /.main -->
  </div><!-- /.content -->
</div><!-- /.wrap -->