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
				?>
				<header class="entry-header">
					<h1>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>
				</header>
				<div class="entry-content"><?php

					if( !empty( get_field('project_summary') ) ){

						$summary = wp_strip_all_tags( get_the_content() );
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

</div><!-- #wrap -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>

