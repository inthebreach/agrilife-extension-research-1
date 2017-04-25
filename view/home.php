<?php
/**
 * Template Name: Extension Research Home
 */

// Remove post title and content
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// Add content
add_action( 'genesis_after_header', 'research_home_slider' );
add_action( 'genesis_entry_content', 'research_home_content' );
add_action( 'genesis_entry_content', 'research_home_sidebar' );

// Modify content
add_filter( 'soliloquy_output_caption', 'research_soliloquy_title_before_caption', 10, 5 );


function research_home_slider() {

    if ( get_field( 'show_slider' ) ) : ?>

        <section class="featured-content clearfix">

        <?php
            $slider_object = get_field( 'select_carousel_slider' );
            $slider = $slider_object->post_name;
            if ( function_exists( 'soliloquy_slider' ) )
                soliloquy_slider( $slider );
        ?>

        </section>

    <?php endif;

}

function research_soliloquy_title_before_caption( $caption, $id, $slide, $data, $i ) {

    // Check if current slide has a title specified
    $object = get_field( 'select_carousel_slider' );
    $title = $object->post_name;
    $this_title = $data['config']['slug'];

    if ( isset( $slide['title'] ) && !empty( $slide['title'] ) ) {
        $caption = '<h3 class="title">' . $slide['title'] . '</h3>';
        $caption .= '<div class="caption">' . $slide['caption'] . '</div>';
    }

    return $caption;
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
