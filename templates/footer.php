<footer class="content-info" role="contentinfo">
  <div class="container">
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
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