<?php

/*
    Plugin Name: JS Quiz
    Description: Give readers mult choice questions.
    Version 1.0
    Author: Me
*/

if(!defined('ABSPATH')) exit; // Exit if accessed directly

class CustGutenbergQuiz {
    public function __construct() {
        add_action('enqueue_block_editor_assets', [$this, 'adminAssets']);
    }

    function adminAssets() {
        //1st arg random name, 2nd arg file to js, 3rd arg dependency
        // wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'test.js', ['wp-blocks']);
        wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'test.js', ['wp-blocks','wp-element']); // added wp-element as dependency on window.element
    }
}

$areYouPayingAttention = new CustGutenbergQuiz();