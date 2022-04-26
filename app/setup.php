<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    bundle('app')->enqueue();
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls'
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Disable the default block patterns.
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable wide alignment support.
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embed support.
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style'
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});

add_action('wp_head', function() {
    if (is_singular()) {
        $post = get_post();
        $postViews = (int)get_post_meta($post->ID, 'post_views', true);
        update_post_meta($post->ID, 'post_views', ++$postViews);
        if (get_option( 'thread_comments' )) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
});

add_action('wp_ajax_like_post', function(){
    $postId = (int)$_POST['post_id'];
    $postLikes = (int)get_post_meta($postId, 'post_likes', true);
    update_post_meta($postId, 'post_likes', ++$postLikes);
    wp_die($postLikes);
});

add_action('wp_ajax_nopriv_like_post', function(){
    $postId = (int)$_POST['post_id'];
    $postLikes = (int)get_post_meta($postId, 'post_likes', true);
    update_post_meta($postId, 'post_likes', ++$postLikes);
    wp_die($postLikes);
});

add_action("admin_menu", function(){
    add_menu_page("主题配置", "主题配置", "manage_options", "theme-panel", function(){
	    echo '<div class="wrap"><h1>主题配置</h1><form method="post" action="options.php" enctype="multipart/form-data">';
        settings_fields("section");
        do_settings_sections("theme-options");      
        submit_button();
	    echo '</form></div>';
    }, null, 99);
});

add_action("admin_init", function(){
    add_settings_section("section", "打赏配置", null, "theme-options");
    add_settings_field("wechat-qr", "微信收款码", function(){
        echo '<input type="file" name="wechat-qr" />';
        echo '<img src="'.get_option('wechat-qr').'" width=200 height=200></img>';
    }, "theme-options", "section");
    register_setting("section", "wechat-qr", function($option){
        if (!empty($_FILES["wechat-qr"]["tmp_name"])) {
            $urls = wp_handle_upload($_FILES["wechat-qr"], array('test_form' => FALSE));
            $temp = $urls["url"];
            return $temp;
        }
        return $option;
    });
});
