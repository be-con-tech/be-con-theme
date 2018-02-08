<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    register_post_type('game', array(
      'labels' => array(
        'name' => 'Games',
        'singular_name' => 'Game'
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array(
        'title',
        'editor',
        'author',
        'excerpt',
        'custom-fields'
      )
    ));

    register_post_type('gm', array(
        'labels' => array(
            'name' => 'GMs',
            'singular_name' => 'GM'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields'
        )
    ));

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

function add_name_field_to_reg($user_id) {
    if (isset($_POST['nickname'])) {
        wp_update_user(array(
            'ID' => $user_id,
            'nickname' => addslashes($_POST['nickname']),
            'display_name' => addslashes($_POST['nickname'])
        ));
    }
}

add_action('user_register', __NAMESPACE__ . '\\add_name_field_to_reg');



function submit_game_proposal() {
    $ret = 0;

    if (!empty($_POST)) {
        $ret = wp_insert_post(array(
            'post_author' => intval(addslashes($_POST['user_id'])),
            'post_title' => addslashes($_POST['game_name']),
            'post_type' => 'game',
            'meta_input' => array(
                'short_description' => addslashes($_POST['short_description']),
                'long_description' => addslashes($_POST['game_description']),
                'written_by' => addslashes($_POST['writers']),
                'run_by' => addslashes($_POST['gms']),
                'primary_contact_email' => addslashes($_POST['email']),
                'organization_name' => addslashes($_POST['organization']),
                'organization_link' => addslashes($_POST['organization_link']),
                'content_warnings' => addslashes($_POST['content_warnings']),
                'age_requirements' => addslashes($_POST['age_requirements']),
                'spaces_female_minimum' => addslashes($_POST['female_min']),
                'spaces_female_maximum' => addslashes($_POST['female_max']),
                'spaces_male_minimum' => addslashes($_POST['male_min']),
                'spaces_male_maximum' => addslashes($_POST['male_max']),
                'spaces_player_defined_minimum' => addslashes($_POST['player_defined_min']),
                'spaces_player_defined_maximum' => addslashes($_POST['player_defined_max']),
                'spaces_other_minimum' => addslashes($_POST['other_min']),
                'spaces_other_maximum' => addslashes($_POST['other_max']),
                'duration' => addslashes($_POST['duration']),
                'special_requirements' => addslashes($_POST['special_requirements']),
                'food_used' => addslashes($_POST['food_used']),
                'physical_abilities' => array_map(addslashes, $_POST['physical_abilities']),
                'physical_abilities_other' => addslashes($_POST['physical_abilities_other']),
                'default_physical_contact' => addslashes($_POST['default_physical_contact']),
                'other_physical_contact' => addslashes($_POST['other_physical_contact']),
                'default_safety_mechanics' => addslashes($_POST['default_safety_mechanics']),
                'other_safety_mechanics' => addslashes($_POST['other_safety_mechanics']),
                'other_mechanics' => addslashes($_POST['other_mechanics']),
                'space_requirements' => array_map(addslashes, $_POST['space_requirements']),
                'slots_available' => array_map(addslashes, $_POST['slots_available']),
                'anything_else' => addslashes($_POST['anything_else'])
            )
        ));
    }
    if ($ret == 0) {
        header('Location:'.$_SERVER['HTTP_REFERER'].'?submitted=error');
    } else {
        header('Location:'.$_SERVER['HTTP_REFERER'].'?submitted=thanks');
    }
    
    exit();
}

add_action('admin_post_nopriv_submit_game_proposal', __NAMESPACE__ . '\\submit_game_proposal');
add_action('admin_post_submit_game_proposal', __NAMESPACE__ . '\\submit_game_proposal');

function update_user_from_frontend() {
    $ret = 0;

    if (!empty($_POST)) {
        $data = array(
            'ID' => intval(addslashes($_POST['user_id']))
        );
        if (isset($_POST['user_email'])) {
            $data['user_email'] = addslashes($_POST['user_email']);
        }
        if (isset($_POST['display_name'])) {
            $data['display_name'] = addslashes($_POST['display_name']);
        }
        if(isset($_POST['user_pass']) && isset($_POST['confirm_user_pass']) && ($_POST['user_pass'] == $_POST['confirm_user_pass'])) {
            $data['user_pass'] = addslashes($_POST['user_pass']);
        }
        $ret = wp_update_user($data);
    }
    if ($ret == $_POST['user_id']) {
        header('Location:'.$_SERVER['HTTP_REFERER'].'?submitted=ok');
    } else {
        print_r($data);
        print_r($ret);
        die();
        header('Location:'.$_SERVER['HTTP_REFERER'].'?submitted=error');
    }
    exit();
}

add_action('admin_post_nopriv_update_user_from_frontend', __NAMESPACE__ . '\\update_user_from_frontend');
add_action('admin_post_update_user_from_frontend', __NAMESPACE__ . '\\update_user_from_frontend');

function unregistered_user_redirect()
{
    if( is_page( 'Account Dashboard' ) && ! is_user_logged_in() )
    {
        wp_redirect( home_url( '/login/' ) );
        die;
    }
}
add_action( 'template_redirect', __NAMESPACE__ . '\\unregistered_user_redirect' );

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}