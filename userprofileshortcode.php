<?php
/*
Plugin Name: User Short
Description: A plugin to display user profile shortcode.
Version: 1.0
Author: Nayan Ray
Text Domain: user_short
*/

// Enqueue scripts and styles
function user_short_enqueue_scripts() {
    wp_enqueue_style('user-short-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('user-short-script', plugins_url('script.js', __FILE__), array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'user_short_enqueue_scripts');

// Shortcode function
function my_user_profile_shortcode() {
    ob_start(); ?>
    <div class="relative">
        <button type="button" class="flex items-center bg-gray-800 text-white rounded-full p-1 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="User photo">
        </button>
        <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
            <div class="py-3 px-4 text-sm text-gray-900">
                <?php $current_user = wp_get_current_user(); ?>
                <div><?php echo $current_user->display_name; ?></div>
                <div class="text-gray-500"><?php echo $current_user->user_email; ?></div>
            </div>
            <ul class="text-gray-700">
                <li><a href="<?php echo esc_url(home_url('/dashboard')); ?>" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                <li><a href="<?php echo esc_url(wp_logout_url()); ?>" class="block px-4 py-2 hover:bg-gray-100"><button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Sign Out</button></a></li>
            </ul>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('user_profile', 'my_user_profile_shortcode');
