<?php
/*
Plugin Name: Tweet Name Link
Description: Adds a button to the TinyMCE to wrap a twitter username in a shortcode that'll build out the link automatically. 
Version: 1.0
Author: Andrew Norcross
Author URI: http://andrewnorcross.com
*/

/*  Copyright 2010 Andrew Norcross

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2 of the License (GPL v2) only.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// create and register button and javascript
add_filter('mce_external_plugins', "tweetname_register");
add_filter('mce_buttons', 'tweetname_add_button', 0);

function tweetname_add_button($buttons) {
    array_push($buttons, "separator", "tweetlink_name");
    return $buttons;
}

function tweetname_register($plugin_array) {
	$tweetname_url = WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) ."/tweetname-button.js";

    $plugin_array['tweetlink_name'] = $tweetname_url;
    return $plugin_array;
}

// Add shortcode function

add_shortcode( 'twitname', 'sc_twitter' );

function sc_twitter( $atts, $content = null ) {
	return '<a class="twitter-name" href="http://twitter.com/#!/'.$content.'" title="'.$content.' on Twitter" rel="nofollow" target="_blank">@'.$content.'</a>';
		return '';
}

