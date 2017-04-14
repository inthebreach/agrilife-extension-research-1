<?php
/**
 * Template Name: Home
 */

// Remove post title and content
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// Add content
add_action( 'genesis_entry_content', 'research_home_slider' );
add_action( 'genesis_entry_content', 'research_home_content' );
add_action( 'genesis_entry_content', 'research_home_sidebar' );


function research_home_slider() {

    if ( get_field( 'show_slider' ) ) : ?>

        <section class="featured-content clearfix">

        <?php
            $slider_object = get_field( 'select_slider' );
            $slider = $slider_object->post_name;
            if ( function_exists( 'soliloquy_slider' ) )
                soliloquy_slider( $slider );
        ?>

        </section>

    <?php endif;

}

function research_home_content() {

    ?>
    <div class="home-content">
        <section id="content" role="main">
            <?php
            the_content();
            ?>
        </section><!-- /end #content -->
    </div>
<?php

}

function research_home_sidebar() {

    // Show date and title of 5 latest events with links

    // Show date and title of 5 latest posts from AgriLife Today with links
    // http://today.agrilife.org/feed/

}


genesis();
