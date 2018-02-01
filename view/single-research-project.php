<?php
 /*Template Name: Research Project
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
<div id="primary">
    <div id="content" role="main">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header row"><div class="columns">
        <h1>
            Research > <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h1>
    </div></header>
    <div class="entry-content">
        <div class="row">
            <div class="columns small-12 medium-12 large-12"><?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        if ( !empty( get_the_content() ) ) :
                            the_content();
                        endif;
                    endwhile;
                endif;
            ?><h2>Summary</h2></div>
        </div>
        <div class="row">
            <div class="columns research-left small-12 medium-9 large-9"><?php

                $fields = get_fields();

                if( !empty( $fields['project_summary'] ) ){

                    echo '<div class="project_summary">';

                    if( !empty( $fields['project_summary_2'] ) ){

                        ?><div class="project-summary-2 right"><?php

                            echo $fields['project_summary_2'];

                        ?></div><?php

                    }

                    echo $fields['project_summary'];
                    echo '</div>';

                }

                if( !empty( $fields['current_research_projects'] ) ){

                    foreach ($fields['current_research_projects'] as $key => $value) {

                        echo $value['research_project'];

                    }

                }

                ?><div class="research-right"><?php

                    $project_leader = $fields['project_leader'];

                    if( !empty( $project_leader ) && !empty( $project_leader['project_leader_name'] ) ){

                        echo '<div class="project_leader"><div class="project_leader_name"><h2>';
                        echo $project_leader['project_leader_name'];
                        echo '</h2></div>';
                        echo '<div class="project_leader_description">';

                        if( !empty( $project_leader['photo'] ) ){

                            echo '<div class="photo"><img';

                            if( !empty( $project_leader['photo']['title'] ) )
                                echo ' title="' . $project_leader['photo']['title'] . '"';

                            if( !empty( $project_leader['photo']['alt'] ) )
                                echo ' alt="' . $project_leader['photo']['alt'] . '"';

                            echo ' src="';
                            echo $project_leader['photo']['sizes']['medium'];
                            echo '">';

                            if( !empty( $project_leader['image_highlight'] ) ){
                                echo '<div class="image_highlight">';
                                echo $project_leader['image_highlight'];
                                echo '</div>';
                            }

                            echo '</div>';

                        }

                        echo $project_leader['project_leader_description'];
                        echo '</div></div>';

                    }

                    if( !empty( $fields['team_members'] ) ){

                        echo '<div class="team_members"><h2>Team Members</h2>';
                        echo $fields['team_members'];
                        echo '</div>';

                    }

                ?></div><?php

                if( !empty( $fields['select_publications'] ) ){

                    ?><div class="select_publications"><h2>Publications</h2><?php

                        echo $fields['select_publications'];

                    ?></div><?php

                }

            ?></div>
        </div>
    </div>
</article>
    </div>
</div>
<?php get_footer(); ?>
