<?php
/**
 * The Template for displaying all people single posts
 */

get_header(); ?>
<div class="content-sidebar-wrap">
	<main class="content"><?php

    print_r(get_fields());

  ?>

	</main><!-- #content -->

</div><!-- #wrap -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

