<?php

// connect to app
$config = array();
$config['appId'] = '670325379698989';
$config['secret'] = 'b502dcb17bec03e89a5796de1b10eb8e';
$config['fileUpload'] = false; // optional

// instantiate
$facebook = new Facebook($config);

// set page id
$pageid = "435706779850810";

$pagefeed = $facebook->api("/" . $pageid . "/feed"); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=670325379698989";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <div class="row">
      <div class="col-md-2">
        <div class="fb-like" data-href="https://www.facebook.com/TheBeranGroup" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
      </div>
      <div class="col-md-10">
        <h3>JOIN THE CONVERSATION</h3>
      </div>
    </div>

    <p>Like us on Facebook, Follow us on Twitter and Pinterest or read our blog and hear about our latest listings, home decor, building tips and more.</p>

<?php

// set counter to 0, because we only want to display 10 posts
$i = 0;
foreach($pagefeed['data'] as $post) {

    if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo') {

        // open up an fb-update div
        echo "<div class=\"fb-update row\">";

            // post the time

            // check if post type is a status
            if ($post['type'] == 'status') {
                echo "<h2>Status updated on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                echo "<p>" . $post['message'] . "</p>";
            }

            // check if post type is a link
            if ($post['type'] == 'link') {
              echo "<div class=\"col-md-2 fb-img\">";
                echo "<img src=\"" . $post['picture'] . "\">";
              echo "</div>";
              echo "<div class=\"col-md-10\">";
                echo "<p>" . $post['message'] . "</p>";
                echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">" . $post['link'] . "</a></p>";
              echo "</div>";
            }

            // check if post type is a photo
            if ($post['type'] == 'photo') {
                echo "<h2>Photo posted on: " . date("jS M, Y", (strtotime($post['created_time']))) . "</h2>";
                if (empty($post['story']) === false) {
                    echo "<p>" . $post['story'] . "</p>";
                } elseif (empty($post['message']) === false) {
                    echo "<p>" . $post['message'] . "</p>";
                }
                echo "<p><a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
            }

        echo "</div>"; // close fb-update div

        $i++; // add 1 to the counter if our condition for $post['type'] is met
    }

    //  break out of the loop if counter has reached 10
    if ($i == 1) {
        break;
    }
} // end the foreach statement
?>