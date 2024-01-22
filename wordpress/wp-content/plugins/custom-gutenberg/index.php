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
        // add_action('enqueue_block_editor_assets', [$this, 'adminAssets']);
        add_action('init', [$this,'adminAssets']);
    }

    function adminAssets() {
        //1st arg random name, 2nd arg file to js, 3rd arg dependency
        // wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'test.js', ['wp-blocks']);
        wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.jsx', ['wp-blocks','wp-element']); // added wp-element as dependency on window.element
        register_block_type('ourplugin/are-you-paying-attention', [
            'editor_script' => 'ournewblocktype',
            'render_callback' => [$this, 'theHTML']
        ]);
    }

    function theHTML($attr) {
        //output buffer
        ob_start(); ?>
        <!-- Can right html here -->
    <p>Today the sky is <?php echo esc_html($attr['skyColor']) ?> and the grass is <?php echo esc_html($attr['grassColor']) ?></p>
        <!-- return '<p>Today the sky is ' . $attr['skyColor'] . ' and the grass is ' . $attr['grassColor']; -->
        <?php return ob_get_clean();
    }
}

$areYouPayingAttention = new CustGutenbergQuiz();