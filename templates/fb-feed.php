<?php

// Add shortcodes



add_shortcode('facebook-feed', 'display_cff');



function display_cff($atts) {



    //Assign the Access Token and Page ID variables



    $access_token = '670325379698989|xTPh1Fb7erMIHSpZZkQLn8txckA';



    $page_id = 'TheBeranGroup';





    //Get show posts attribute. If not set then default to 10.



    $show_posts = 1;



    //Check whether the Access Token is present and valid



    if ($access_token == '') {



        echo 'Please enter a valid Access Token. You can do this in the Custom Facebook Feed plugin settings.<br /><br />';



        return false;



    }







    //Check whether a Page ID has been defined



    if ($page_id == '') {



        echo "Please enter the Page ID of the Facebook feed you'd like to display.  You can do this in either the Custom Facebook Feed plugin settings or in the shortcode itself. For example [custom_facebook_feed id=<b>YOUR_PAGE_ID</b>].<br /><br />";



        return false;



    }


    //Get JSON object of feed data
    function fetchUrl($url){
        //Can we use cURL?
        if(is_callable('curl_init')){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $feedData = curl_exec($ch);
            curl_close($ch);

        //If not then use file_get_contents
        } elseif ( ini_get('allow_url_fopen') == 1 || ini_get('allow_url_fopen') === TRUE ) {
            $feedData = @file_get_contents($url);

        //Or else use the WP HTTP API
        } else {
            if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );
            $request = new WP_Http;
            $result = $request->request($url);
            $feedData = $result['body'];

        }

        return $feedData;
    }



    //Get the contents of the Facebook page
    //https://graph.facebook.com/TheBeranGroup/posts?access_token=670325379698989|xTPh1Fb7erMIHSpZZkQLn8txckA
    $json_object = fetchUrl('https://graph.facebook.com/' . $page_id . '/posts?access_token=' . $access_token);


    //Get the profile picture
    //https://graph.facebook.com/TheBeranGroup/picture?redirect=0&height=200&type=normal&width=200
    $json_pic = fetchUrl('https://graph.facebook.com/' . $page_id . '/picture?redirect=0&height=200&type=normal&width=200');

    //Interpret data with JSON

    $FBdata = json_decode($json_object);
    $FBpic = json_decode($json_pic);



    //Create HTML
    $content = '<div id="cff" class="visible-md visible-lg">';

    //Likebox

    $content .= '<div class="cff-likebox"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/' . $page_id . '" show_faces="false" stream="false" header="false" data-layout="button_count"></fb:like-box></div>';

    $content .='<h3>JOIN THE CONVERSATION</h3>';
    $content .='<p class="visible-md visible-lg like-us"><small>Like us on Facebook, Follow us on Twitter and Pinterest or read our blog and hear about our latest listings, home decor, building tips and more.</small></p>';

    //Limit var
    $i = 0;



    foreach ($FBdata->data as $news )



    {



        //Explode News and Page ID's into 2 values



        $PostID = explode("_", $news->id);



        //Check whether it's a status (author comment or like)

        if ( ( $news->type == 'status' && !empty($news->message) ) || $news->type !== 'status' ) {

            //If it isn't then create the post

            //Only create posts for the amount of posts specified

            if ( $i == $show_posts ) break;

            $i++;

            //Start the container
            $content .= '<div class="cff-item row">';

            //Check for media
            //Make small images big
            if (!empty($news->picture)) {
                $picture_b = $news->picture;
                $picture_b = str_replace('_s','_n',$picture_b);
            }

            if ($news->type == 'link') {



                $story = $news->story;



                //Check whether it's an event
                $created_event = 'created an event.';
                $shared_event = 'shared an event.';

                $created_event = stripos($story, $created_event);
                $shared_event = stripos($story, $shared_event);



                if ( $created_event || $shared_event ){

                    //Get the event object

                    $eventID = $PostID[1];
                    if ( $shared_event ) {
                        //Get the event id from the event URL. eg: http://www.facebook.com/events/123451234512345/
                        $event_url = parse_url($news->link);
                        $url_parts = explode('/', $event_url['path']);
                        //Get the id from the parts
                        $eventID = $url_parts[count($url_parts)-2];
                    }


                    //Get the contents of the event using the WP HTTP API

                    $event_json = fetchUrl('https://graph.facebook.com/'.$eventID.'?access_token=' . $access_token);



                    //Interpret data with JSON

                    $event_object = json_decode($event_json);



                    //Display the event details

                    $content .= '<div class="details">';

                    if (!empty($event_object->name)) $content .= '<h5>' . $event_object->name . '</h5>';

                    if (!empty($event_object->location)) $content .= '<p>Where: ' . $event_object->location . '</p>';

                    if (!empty($event_object->start_time)) $content .= '<p>When: ' . date("F j, Y, g:i a", strtotime($event_object->start_time)) . '</p>';

                    if (!empty($event_object->description)){

                        $description = $event_object->description;

                        if (isset($body_limit) && $body_limit !== '') {

                            if (strlen($description) > $body_limit) $description = substr($description, 0, $body_limit) . '...';

                        }

                        $content .= '<p>' . cff_make_clickable($description) . '</p>';
                    }



                    $content .= '</div><!-- end .details -->';

                } else if (!empty($news->picture)) {

                }



                //Display link name and description

                if (!empty($news->description)) {

                    $content .= '<div class="col-sm-12"><a class="text-link" href="'.$news->link.'" target="_blank">'. '<strong>' . $news->name . '</strong></a></div>';

                }

            }

            else if ($news->type == 'photo') {

                $content .= '<div class="col-sm-12 col-md-4"><a title="View on Facebook" class="cff-photo" href="'.$news->link.'" target="_blank"><img src="'. $picture_b .'" border="0" /></a></div>';

            }

            else if ($news->type == 'video') {



                // url of video

                $url = $news->link;

                //Embeddable video strings

                $youtube = 'youtube';

                $youtu = 'youtu';

                $vimeo = 'vimeo';


                //Check whether it's a youtube video
                $youtube = stripos($url, $youtube);
                $youtu = stripos($url, $youtu);


                //Check whether it's a youtube video
                if($youtube || $youtu) {
                    //Get the unique video id from the url by matching the pattern
                    if ($youtube) {
                        if (preg_match("/v=([^&]+)/i", $url, $matches)) {
                            $id = $matches[1];
                        }   elseif(preg_match("/\/v\/([^&]+)/i", $url, $matches)) {
                            $id = $matches[1];
                        }
                    } elseif ($youtu) {
                        $id = end(explode('/', $url));
                    }

                    // this is your template for generating embed codes
                    $code = '<iframe class="youtube-player" type="text/html" width="640" height="360" src="http://www.youtube.com/embed/{id}" allowfullscreen frameborder="0"></iframe>';
                    // we replace each {id} with the actual ID of the video to get embed code for this particular video
                    $code = str_replace('{id}', $id, $code);
                    $content .= $code;



                //Check whether it's a vimeo

                } else if(stripos($url, $vimeo) !== false) {

                    // we get the unique video id from the url by matching the pattern

                    preg_match("/\/(\d+)$/", $url, $matches);

                    $id = $matches[1];

                    // this is your template for generating embed codes

                    $code = '<iframe src="http://player.vimeo.com/video/{id}" width="640" height="360" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

                    // we replace each {id} with the actual ID of the video to get embed code for this particular video

                    $code = str_replace('{id}', $id, $code);

                    $content .= $code;



                //Else link to the video file

                } else {

                    //Show play button over video thumbnail

                    $content .= '<a title="Play Video" class="cff-vidLink" href="' . $news->source . '"><div class="cff-playbtn"><img src="'. plugins_url( 'img/play.png' , __FILE__ ) .'" /></div><img class="poster" src="' . $picture_b . '" alt="' . $news->description . '" /></a>';

                }

            } else {
                $content .= '<div class="col-sm-12 col-md-4"><a title="View on Facebook" class="cff-photo" href="'.$news->link.'" target="_blank"><img src="'. $FBpic->data->url .'" border="0" /></a></div>';
            }






            //Text limits


            if (!empty($news->story)) {

                $story_text = $news->story;

                if (isset($title_limit) && $title_limit !== '') {

                    if (strlen($story_text) > $title_limit) $story_text = substr($story_text, 0, $title_limit) . '...';

                }

                $content .= '<div class="col-sm-12 col-md-8"><h4>' . cff_make_clickable($story_text) . '</h4></div>';

            }



            if (!empty($news->message)) {

                $message_text = $news->message;

                if (isset($title_limit) && $title_limit !== '') {

                    if (strlen($message_text) > $title_limit) $message_text = substr($message_text, 0, $title_limit) . '...';

                }

                $content .= '<div class="col-sm-12 col-md-8"><p><strong>' . cff_make_clickable($message_text) . '</strong></p></div>';

            }



            if (!empty($news->description)) {

                $description_text = $news->description;

                if (isset($body_limit) && $body_limit !== '') {

                    if (strlen($description_text) > $body_limit) $description_text = substr($description_text, 0, $body_limit) . '...';

                }

                $content .= '<div class="col-sm-12"><p><strong>' . cff_make_clickable($description_text) . '</strong></p></div>';

            }

            //Display the link to the Facebook post or external link

            if (!empty($news->link)) {

                $link = $news->link;

                //Check whether it links to facebook or somewhere else

                $facebook_str = 'facebook.com';

                if(stripos($link, $facebook_str) !== false) {

                    $link_text = 'View on Facebook';

                } else {

                    $link_text = 'View Link';

                }

                $content .= '<div class="col-sm-4"><a class="cff-viewpost" href="' . $link . '" title="' . $link_text . '" target="_blank">' . $link_text . '</a></div>';

            } else {
                
                $content .= '<div class="col-sm-4"><a class="cff-viewpost" href="' . $link . '" title="' . $link_text . '" target="_blank">' . $link_text . '</a></div>';
            }

            //Check for likes

            $content .= '<div class="col-sm-4"><a href="javaScript:void(0);" class="view-comments"><ul class="cff-meta"><li class="likes"><span>Likes:</span> ';

            if (empty($news->likes->data)) { $content .= '0'; }

            else { $content .= count($news->likes->data); }


            //Check for comments

            $content .= '</li><li class="comments"><span>Comments:</span> ';



            //Check whether the comment count is available

            if (empty($news->comments->count)) {

                //If not then count the comments manually

                $comment_count = count($news->comments->data);

                //If there is no comments then display zero

                $content .= ($comment_count == 0) ? "0" : $comment_count;

                //If there's too many to count manually then display '+' sign after number

                if($comment_count >= 25) $content .= "+";

            } else {

                //If the count is available then display it instead

                $comment_count = $news->comments->count;

                $content .= $comment_count;

            }

            $content .= '</li></ul></a></div>';

            $content .= '<div class="col-sm-8"><p class="cff-date">Posted '. cff_timeSince(strtotime($news->created_time)) . ' ago</p></div>';

            //End the post item

            $content .= '</div><div class="clear"></div> <!-- end .cff-item -->';



        } // End status check



    } // End the loop




    $content .= '</div><div class="clear"></div> <!-- end .Custom Facebook Feed -->';







    //Return our feed HTML to display



    return $content;







}





//Make links in text clickable
function cff_make_url_clickable($matches) {
    $ret = '';
    $url = $matches[2];

    if ( empty($url) )
        return $matches[0];
    // removed trailing [.,;:] from URL
    if ( in_array(substr($url, -1), array('.', ',', ';', ':')) === true ) {
        $ret = substr($url, -1);
        $url = substr($url, 0, strlen($url)-1);
    }
    return $matches[1] . "<a href=\"$url\" rel=\"nofollow\" target='_blank'>$url</a>" . $ret;
}
function cff_make_web_ftp_clickable($matches) {
    $ret = '';
    $dest = $matches[2];
    $dest = 'http://' . $dest;

    if ( empty($dest) )
        return $matches[0];
    // removed trailing [,;:] from URL
    if ( in_array(substr($dest, -1), array('.', ',', ';', ':')) === true ) {
        $ret = substr($dest, -1);
        $dest = substr($dest, 0, strlen($dest)-1);
    }
    return $matches[1] . "<a href=\"$dest\" rel=\"nofollow\" target='_blank'>$dest</a>" . $ret;
}
function cff_make_email_clickable($matches) {
    $email = $matches[2] . '@' . $matches[3];
    return $matches[1] . "<a href=\"mailto:$email\">$email</a>";
}
function cff_make_clickable($ret) {
    $ret = ' ' . $ret;
    // in testing, using arrays here was found to be faster
    $ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', 'cff_make_url_clickable', $ret);
    $ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', 'cff_make_web_ftp_clickable', $ret);
    $ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', 'cff_make_email_clickable', $ret);

    // this one is not in an array because we need it to run last, for cleanup of accidental links within links
    $ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
    $ret = trim($ret);
    return $ret;
}





//Time stamp function



function cff_timeSince($original) {



    // Array of time period



    $chunks = array(



        array(60 * 60 * 24 * 365 , 'year'),



        array(60 * 60 * 24 * 30 , 'month'),



        array(60 * 60 * 24 * 7, 'week'),



        array(60 * 60 * 24 , 'day'),



        array(60 * 60 , 'hour'),



        array(60 , 'minute'),



    );







    // Current time



    $today = time();



    $since = $today - $original;







    // $j saves performing the count function each time around the loop



    for ($i = 0, $j = count($chunks); $i < $j; $i++) {







        $seconds = $chunks[$i][0];



        $name = $chunks[$i][1];







        // finding the biggest chunk (if the chunk fits, break)



        if (($count = floor($since / $seconds)) != 0) {



            break;



        }



    }







    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";







    if ($i + 1 < $j) {



        // now getting the second item



        $seconds2 = $chunks[$i + 1][0];



        $name2 = $chunks[$i + 1][1];







        // add second item if it's greater than 0



        if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {



            $print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";



        }



    }



    return $print;



}









//Allows shortcodes in sidebar of theme



add_filter('widget_text', 'do_shortcode');


//Comment out the line below to view errors
//error_reporting(0);

?>