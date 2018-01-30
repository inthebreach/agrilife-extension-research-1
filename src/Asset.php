<?php

namespace AgriLife\ExtensionResearch;

class Asset {

	public function __construct() {

        $this->add_image_sizes();

        // Register global styles used in the theme
        add_action( 'wp_enqueue_scripts', array( $this, 'register_extres_styles' ) );

        // Enqueue extension styles
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_extres_styles' ) );

        // Dequeue global styles
        add_action( 'wp_print_styles', array( $this, 'dequeue_global_styles'), 5 );

        // Register admin scripts used in the theme
        add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_styles' ) );

        // Enqueue admin scripts
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );

	}

    /**
     * Add the required image sizes
     * @return void
     */
    public function add_image_sizes() {

        add_image_size( 'content-full-width', 760, 570, true );
        add_image_size( 'programs-feature', 248, 186, true );
        add_image_size( 'program-solution_single', 560, 315, true );
        add_image_size( 'post-thumbnail', 75, 75, true );
        add_image_size( 'home-hero', 750, 347, true );
        add_image_size( 'home-featured', 350, 197, true);

    }

    /**
     * Registers all styles used within the plugin
     * @since 1.0
     * @return void
     */
    public function register_extres_styles() {

        wp_register_style(
            'extension-research-styles',
            AF_THEME_DIRURL . '/css/ext-research.css',
            array(),
            '',
            'screen'
        );

        wp_register_style(
            'extension-research-project-styles',
            AG_EXTRES_DIR_URL . 'css/research-project.css',
            array(),
            '',
            'screen'
        );

        wp_register_style(
            'extension-research-font',
            'https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700',
            array(),
            '',
            'screen'
        );

    }

    /**
     * Enqueues extension styles
     * @since 1.0
     * @global $wp_styles
     * @return void
     */
    public function enqueue_extres_styles() {

        wp_enqueue_style( 'extension-research-styles' );
        wp_enqueue_style( 'extension-research-project-styles' );
        wp_enqueue_style( 'extension-research-font' );

    }

    /**
    * Registers globally used scripts
    * @since 1.0
    * @return void
    */
    public function register_admin_styles() {

    wp_register_style(
        'extension-research-admin',
        AG_EXTRES_DIR_URL . 'css/admin.css',
        array(),
        '',
        'screen'
    );

    }

    /**
    * Enqueues globally used scripts
    * @since 1.0
    * @return void
    */
    public function enqueue_admin_styles() {

        wp_enqueue_style( 'extension-research-admin' );

    }

    /**
     * Dequeues global styles
     * @since 1.0
     * @global $wp_styles
     * @return void
     */
    public function dequeue_global_styles() {

        wp_dequeue_style( 'default-styles' );

    }

}
