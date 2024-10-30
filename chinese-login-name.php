<?php
/*
Plugin Name: Chinese Login Name
Plugin URI: http://www.sohao.net/chinese-login-name
Description: Enables you register your admin username in Simplified Chinese and login the wp-admin by it.
Author: sohao.net
Version: 0.1
Author URI: http://www.sohao.net
License: GNU General Public License 2.0 http://www.gnu.org/licenses/gpl.html
*/

function sanitize_chinese_user($username, $raw_username, $strict) {
	if ($username != $raw_username) $username = $raw_username;
	$username = strip_tags($username);

	// Kill Chinese characters
    $username = preg_replace('|[^a-z0-9 _.\-@一-龥]|ui', '', $username);

	// Consolidate contiguous whitespace
	$username = preg_replace('|\s+|', ' ', $username);

	return apply_filters('sanitize_chinese_user', $username, $raw_username, $strict);
}

add_filter('sanitize_user', 'sanitize_chinese_user', 1, 3);