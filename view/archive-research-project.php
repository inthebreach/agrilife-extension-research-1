<?php
/**
 * The Template for displaying all people single posts
 */

// Queue styles
add_action( 'wp_enqueue_scripts', 'aer_project_register_styles' );
add_action( 'wp_enqueue_scripts', 'aer_project_enqueue_styles' );

function aer_project_register_styles(){
	?><script>console.log("register");</script><?php
    wp_register_style(
        'extension-research-project-styles',
        AG_EXTRES_DIR_URL . 'css/research-project.css',
        array(),
        '',
        'screen'
    );

}

function aer_project_enqueue_styles(){

    wp_enqueue_style( 'extension-research-project-styles' );

}

get_header(); ?>
<div class="content-sidebar-wrap">
	<main class="content">
		<h1 class="entry-title"><a href="<?php echo get_post_type_archive_link( 'research-project' ); ?>">Research Project Archive</a></h1><?php

		if( have_posts() ) :
			while( have_posts() ) : the_post();
				genesis_entry_header_markup_open();
				genesis_do_post_title();
				genesis_entry_header_markup_close(); ?>
				<div class="entry-content"><?php

					$summary = empty( get_field('aer_project_summary') ) ? get_the_content() : get_field('aer_project_summary');

					if( !empty( $summary ) ){

						$summary = wp_strip_all_tags( $summary );
						$summary = wp_trim_words( $summary, 55, '...' );
						echo '<p>' . $summary . '</p>';

					}

				?>
				</div><?php
			endwhile;
		endif;

		?>
		<div class="clearfix"></div>
		<div class="pagination">
		<?php
			echo paginate_links();
		?>
		</div>

	</main><!-- #content -->
	<?php
		if( 'content-sidebar' === genesis_site_layout() ){
			get_sidebar();
		}
	?>
</div><!-- #wrap -->

<?php get_footer(); ?>
