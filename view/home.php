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
add_action( 'genesis_before_sidebar_widget_area', 'research_home_sidebar' );
add_action( 'genesis_entry_content', 'research_home_template_programs' );

// Remove content
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

// Modify content
add_filter( 'soliloquy_output_caption', 'research_soliloquy_title_before_caption', 10, 5 );
add_filter( 'soliloquy_output_before_caption', 'research_soliloquy_caption_link', 9999, 5 );
add_filter( 'soliloquy_output_after_caption', 'research_soliloquy_caption_close_link' );
add_filter( 'soliloquy_output_container_style', 'research_soliloquy_container_style', 9999, 5 );
add_filter( 'soliloquy_pre_data', 'research_soliloquy_set_dimensions', 9999, 5 );
add_filter( 'feedzy_meta_output', 'research_feedzy_changemeta' );
add_filter( 'feedzy_global_output', 'research_feedzy_customoutput' );

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

    if ( is_active_sidebar( 'home-sidebar' ) ) {

        dynamic_sidebar( 'home-sidebar' );

    }

}

function research_home_template_programs() {

    if ( get_field( 'programs' ) && have_rows( 'programs' ) ) {

        $count = (int)get_field( 'columns' );
        $zfcols = (12 - 12 % $count) / $count;
        $align = get_field( 'text_alignment' );
        $programs = get_field( 'programs' );
        $i = 0;

        $content = '<div class="programs"><div class="row">';

        foreach( $programs as $program ){

            $heading = $program['heading'];
            $img = $program['image'];
            $desc = $program['description'];
            $link = $program['link'];
            $linkopen = $linkclose = '';

            if( $link != '' ){
                $linkopen = '<a href="' . $link . '">';
                $linkclose = '</a>';
            }

            if( $heading != '' ){
                $heading = '<h3>' . $heading . '</h3>';
            }

            if( $img != '' ){
                $img = sprintf( '<img src="%s" alt="%s" title="%s" />', $img['sizes']['medium_large'], $img['alt'], $img['title'] );
            }

            $content .= sprintf( '<div class="small-12 medium-%s large-%s columns">%s%s%s%s%s</div>', $zfcols, $zfcols, $linkopen, $heading, $img, $linkclose, $desc );

            // Ensure each row of columns is contained
            $i++;
            if( $i % $count == 0 && $i < count($programs) ){
                $content .= '</div><div class="row">';
            }

        }

        $content .= '</div></div>';

        echo $content;

    }

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

function research_soliloquy_caption_link( $caption, $id, $slide, $data, $i ) {

    if ( isset( $slide['link'] ) && !empty( $slide['link'] ) ) {

        $caption = $caption . '<a href="' . $slide['link'] . '" class="soliloquy-caption">';

    }

    return $caption;

}

function research_soliloquy_caption_close_link( $caption ) {

    return '</a>' . $caption;

}

function research_soliloquy_container_style( $styles ){

    return preg_replace('/margin[^;]+;/', 'margin: 0 auto;', $styles);

}

function research_soliloquy_set_dimensions( $data, $slider_id ){

    if ( wp_is_mobile() ) {

        // Do not display the slider on mobile devices
        return false;

    } else {

        // Ensure slides are not scaled down by the user
        $data['config']['slider_size'] = 'full_width';
        $data['config']['slider_width'] = 0;
        $data['config']['slider_height'] = 300;

        // Ensure slides are not cropped by Soliloquy
        $data['config']['slider'] = 0;

        // Ensure slider is not scaled for each image
        $data['config']['smooth'] = 0;

    }

    return $data;

}

function research_feedzy_changemeta( $meta ){

    preg_match('/on (\w+\s\d+,\s\d+) at/', $meta, $matches);

    return $matches[1];

}

function research_feedzy_customoutput( $content ){

    // Remove inline styles
    $content = preg_replace('/\s+style="[^"]*"/', '', $content);
    // Remove small tags
    $content = preg_replace('/<\/?small>/', '', $content);
    // Switch title and meta
    $content = preg_replace('/(<span class="title">[^<]+<a[^>]+>[^<]+<\/a>[^<]+<\/span>)([^<]+)(<div class="rss_content">[^<]+<\/div>)/', '$3$2$1', $content);

    return $content;

}

genesis();
