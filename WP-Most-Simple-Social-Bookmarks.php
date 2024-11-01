<?php
/*
Plugin Name: Most Simple Social Bookmarks
Version: 1.0
Description: Automatically adds major bookmarks to your website. No configuration required at all. Activate the plugin and you are good to go.
Author: Ameya Pimpalgaonkar
Author URI: http://www.ameyablog.com
Plugin URI: http://www.ameyablog.com/wordpress/download-most-simple-social-bookmarks-wordpress-plugin/
Icons Designed by http://chethstudios.blogspot.com/
WP-Most-Simple-Social-Bookmarks

*/


/* Version check */
global $wp_version;
$exit_msg='WP-Most-Simple-Social-Bookmarks requires WordPress 2.5 or newer.
<a href="http://codex.wordpress.org/Upgrading_WordPress">Please
update!</a>';
if (version_compare($wp_version,"2.5","<"))
{
exit ($exit_msg);
}


function WP_Most_Simple_Social_Bookmarks($content)



{

// Defined global parameters which are required for submitting content to social bookmarking sites. 
 global $post;
 global $link;
 $link=urlencode(get_permalink($post->ID)); /*urlencode is convenient when encoding a string to be used in a query part of a URL, as a convenient way to pass variables to the next page */
 global $title;
 $title=urlencode($post->post_title); // returns post title
 global $text;
 $text=urlencode(substr(strip_tags($post->post_content), 0, 350)); // returns HTML, PHP tags stripped string
 global  $url;
 $url = get_permalink(); // returns permalink of the post
 $Social_images_folder = get_settings('home') . '/wp-content/plugins/wp-most-simple-social-bookmarks/images/';
	
		
$content .= "\n\n" 
				  
                  . '<a href="http://twitter.com/share?url=' . urlencode($url) . '&amp;url=' . $link . '" target="_blank" rel="nofollow" title="Twitter"><img src="' . $Social_images_folder . 'twitter.png" alt="Twitter" title="Twitter" /></a>' . "\n"				  
                  . '<a href="http://del.icio.us/post?url=' . $link . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="del.icio.us"><img src="' . $Social_images_folder . 'delicious2.png" alt="del.icio.us" title="del.icio.us" /></a>' . "\n"
                  . '<a href="http://digg.com/submit?phase=2&amp;url=' . $link . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Digg"><img src="' . $Social_images_folder . 'digg.png" alt="Digg" title="Digg" /></a>' . "\n"
                  . '<a href="http://facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" target="_blank" rel="nofollow" title="Facebook"><img src="' . $Social_images_folder . 'facebook.png" alt="Facebook" title="Facebook" /></a>' . "\n"
                  . '<a href="http://www.linkedin.com/shareArticle?url=' . $link . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="linked-in"><img src="' . $Social_images_folder . 'linkedin.png" alt="linked-in" title="linked-in" /></a>' . "\n"
                  . '<a href="http://buzz.yahoo.com/submit?submitUrl=' . $title . '&amp;u=' . $link . '" target="_blank" rel="nofollow" title="Yahoo Buzz"><img src="' . $Social_images_folder . 'yahoo.png" alt="Yahoo Buzz" title="Yahoo Buzz" /></a>' . "\n"
                  . '<a href="http://stumbleupon.com/submit?url=' . $link . '&amp;title=' . $title . '&amp;newcomment=' . $title . '" target="_blank" rel="nofollow" title="StumbleUpon"><img src="' . $Social_images_folder . 'su.png" alt="StumbleUpon" title="StumbleUpon" /></a>' . "\n"
                  . '</div>' . "\n" . "\n\n";



return $content;
}

add_filter('the_content', 'WP_Most_Simple_Social_Bookmarks');
?>