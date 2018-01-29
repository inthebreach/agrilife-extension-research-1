<?php
/**
 * The Template for displaying all people single posts
 */

get_header(); ?>
<div class="content-sidebar-wrap">
	<main class="content">
		<h1 class="entry-title"><a href="<?php echo get_post_type_archive_link( 'research-project' ); ?>">Research Project Archive</a></h1><?php

		if( have_posts() ) :
			while( have_posts() ) : the_post();
				?>
				<header class="entry-header">
					<h1>
						<a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
					</h1>
				</header>
				<div class="entry-content"><?php

					if( !empty( get_field('project_summary') ) ){

						$summary = wp_strip_all_tags( get_field('project_summary') );
						$summary = wp_trim_words( $summary, '...' );
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

