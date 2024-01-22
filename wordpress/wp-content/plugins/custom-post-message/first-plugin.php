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

        // LOCATION FIELD
        //wcp_location from register_settings, 'word-count-settings-page' is the page url, section 
        add_settings_field('wcp_location', 'Display Location', [$this, 'locationHTML'], 'word-count-settings-page', 'wcp_first_section');
        //sanitize_text_field built in wp to sanitize for us
        register_setting('wordcountplugin','wcp_location',['sanitize_callback' => [$this,'sanitizeLocation'],'default' => 0]);

        // Headline Field
        add_settings_field('wcp_headline', 'Headline Text', [$this, 'headLineHTML'], 'word-count-settings-page', 'wcp_first_section');
        register_setting('wordcountplugin','wcp_headline',['sanitize_callback' => 'sanitize_text_field','default' => 'Post Statistics']);
        
        // Tried to add an arguement
        // add_settings_field('wcp_wordcount', 'Word Count', [$this, 'checkBoxHTML', 'wcp_wordcount'], 'word-count-settings-page', 'wcp_first_section');
        // register_setting('wordcountplugin','wcp_headline',['sanitize_callback' => 'sanitize_text_field','default' => true]);

        add_settings_field('wcp_wordcount', 'Word Count', [$this, 'checkBoxHTML'], 'word-count-settings-page', 'wcp_first_section', 'wcp_wordcount');
        register_setting('wordcountplugin','wcp_wordcount',['sanitize_callback' => 'sanitize_text_field','default' => true]);

        add_settings_field('wcp_charcount', 'Character Count', [$this, 'checkBoxHTML'], 'word-count-settings-page', 'wcp_first_section', 'wcp_charcount');
        register_setting('wordcountplugin','wcp_charcount',['sanitize_callback' => 'sanitize_text_field','default' => false]);

        add_settings_field('wcp_readtime', 'Read Time', [$this, 'checkBoxHTML'], 'word-count-settings-page', 'wcp_first_section', 'wcp_readtime');
        register_setting('wordcountplugin','wcp_readtime',['sanitize_callback' => 'sanitize_text_field','default' => true]);
        
    }

    // Input HTML 
    function locationHTML() { ?>
        <select name="wcp_location" id="wcp_location">
            <!-- Get Option doesn't access the option db in one trip cause of autoload and build in-->
            <option value="0" <?php selected(get_option('wcp_location',0))?>>Beginning Of Post</option>
            <option value="1" <?php selected(get_option('wcp_location', 1)) ?>>End Of Post</option>
        </select>
    <?php }

    function headLineHTML() { ?>
        <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')) ?>" />
    <?php }

    function checkBoxHTML(string $name) { ?>
        <input type="checkbox" name="<?php echo $name ?>" id="<?php echo $name?>" value="1" <?php checked(get_option($name),1)?>>
    <?php }

    function ourHTML() { ?>
        <div class="wrap"> 
            <h1>Word Count Settings</h1>
            <form action="options.php" method="POST">
                <?php
                    settings_fields('wordcountplugin');
                    do_settings_sections('word-count-settings-page');
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    // Hooks into settings page

    function adminPage() {
        //manage_options permissions or "CAPABILITY"
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', [$this,'ourHTML']);
    }

    //Helper

    function sanitizeLocation($input) {
        if($input != '0' AND $input != '1') {
            add_settings_error('wcp_location','wcp_location_error', 'Display location must be either beginning or end');
            return get_option('wcp_location');
        }
        return $input;
    }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();

