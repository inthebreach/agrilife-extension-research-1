<?php
 /*Template Name: Research Project
 */

get_header(); ?>
<div id="primary">
    <div id="content" role="main">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>

    <!-- Display movie review contents -->
    <div class="entry-content"><?php

        print_r(get_fields());

    ?></div>
</article>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
