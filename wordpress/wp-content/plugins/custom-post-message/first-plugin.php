<?php
/*
Plugin Name: First plugin
Description: A truly amazing plugin.
Version: 1.0
Author URI: //
*/

// add_filter('the_content', 'addToEndOfPost');

// function addToEndOfPost($content) {
//     return $content . '<p>my name is....</p>';
// }

class WordCountAndTimePlugin {

    public function __construct() {
        //becuase in class second arguement is an array instead of string, with it poiting to this class and the method name
        add_action('admin_menu',[$this, 'adminPage']);
        add_action('admin_init',[$this,'settings']);
    }

    function settings() { 
        add_settings_section('wcp_first_section',null,null,'word-count-settings-page');

        //wcp_location from register_settings, 'word-count-settings-page' is the page url, section 
        add_settings_field('wcp_location', 'Display Location', [$this, 'locationHTML'], 'word-count-settings-page', 'wcp_first_section');

        //sanitize_text_field built in wp to sanitize for us
        register_setting('wordcountplugin','wcp_location',['sanitize_callback' => 'sanitize_text_field','default' => 0]);
    }
    
    function adminPage() {
        //manage_options permissions or "CAPABILITY"
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', [$this,'ourHTML']);
    }

    function ourHTML() { ?>
        <div class="wrap"> 
            <h1>Word Count Settings</h1>
        </div>
    <?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();

