<?php
/**
 * The Template for displaying all people single posts
 */


get_header(); ?>

<div class="<?php echo genesis_site_layout(); ?>-wrap">
	<div class="content" id="content" role="main">
		<h1 class="entry-title">People</h1>
		<?php

		ALP_Templates::search_form();

		$people = ALP_Query::get_people();

		ob_start();
		require AG_EXTRES_TEMPLATE_PATH . '/people-list.php';
		$output = ob_get_contents();
		ob_clean();

		echo $output;

		?>
	</div><!-- #content --><?php

	get_sidebar();

	?>
</div><!-- #wrap --><?php

get_footer();

?>
