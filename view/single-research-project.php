<?php
 /*Template Name: Research Project
 */

// Queue assets
add_action( 'wp_enqueue_scripts', 'aer_project_register' );
add_action( 'wp_enqueue_scripts', 'aer_project_enqueue' );

function aer_project_register(){

    wp_register_style(
        'extension-research-project-styles',
        AG_EXTRES_DIR_URL . 'css/research-project.css',
        array(),
        '',
        'screen'
    );

    wp_register_script( 'extension-research-project-scripts',
        AG_EXTRES_DIR_URL . 'js/research-project.js',
        false,
        true,
        true
    );

}

function aer_project_enqueue(){

    wp_enqueue_style( 'extension-research-project-styles' );
    wp_enqueue_script( 'extension-research-project-scripts' );

}

get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>
<div id="primary">
    <div id="content" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header row"><div class="columns">
                <h1>
                    Research > <?php the_title(); ?>
                </h1>
            </div></header>
            <div class="entry-content">
                <div class="row">
                    <div class="columns small-12 medium-12 large-12">
                        <?php
                            if ( !empty( get_the_content() ) ) :
                                the_content();
                            endif;
                        ?><h2>Summary</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="columns small-12 medium-12 large-9"><?php

                        $fields = get_fields();
                        if( !empty( get_field('aer_project_summary') ) ){

                            ?><div class="project-summary"><?php

                                if( !empty( get_field('aer_project_summary_2') ) ){

                                    ?><div class="project-summary-2"><?php

                                        echo get_field('aer_project_summary_2');

                                    ?></div><?php

                                }

                                echo get_field('aer_project_summary');

                            ?></div><?php

                        }

                        if( !empty( get_field('aer_project_research_1') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_1');

                                ?>
                            </div><?php

                        }

                        if( !empty( get_field('aer_project_research_2') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_2');

                                ?>
                            </div><?php

                        }

                        if( !empty( get_field('aer_project_research_3') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_3');

                                ?>
                            </div><?php

                        }

                        if( !empty( get_field('aer_project_research_4') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_4');

                                ?>
                            </div><?php

                        }

                        if( !empty( get_field('aer_project_research_5') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_5');

                                ?>
                            </div><?php

                        }

                        if( !empty( get_field('aer_project_research_6') ) ){

                            ?><div class="aer-accordion"><?php

                                echo get_field('aer_project_research_6');

                                ?>
                            </div><?php

                        }

                        ?>
                    </div>
                    <div class="columns research-right small-12 medium-12 large-3">
                        <div class="row"><?php

                            $project_leader = get_field('aer_project_leader');

                            if( !empty( $project_leader ) && !empty( $project_leader['aer_project_leader_name'] ) ){

                                ?><div class="project-leader columns small-12 medium-7 large-12">
                                    <div class="project-leader-name"><h2><?php
                                        echo $project_leader['aer_project_leader_name'];
                                    ?></h2></div><?php
                                    ?><div class="project-leader-description"><?php

                                        if( !empty( $project_leader['aer_project_leader_photo'] ) ){

                                            ?><div class="photo small-only-text-right medium-only-text-right"><img<?php

                                            if( !empty( $project_leader['aer_project_leader_photo']['title'] ) )
                                                ?> title="<?php echo $project_leader['aer_project_leader_photo']['title'] ?>"<?php

                                            if( !empty( $project_leader['aer_project_leader_photo']['alt'] ) )
                                                ?> alt="<?php echo $project_leader['aer_project_leader_photo']['alt']; ?>"<?php

                                            ?> src="<?php echo $project_leader['aer_project_leader_photo']['sizes']['medium']; ?>"><?php

                                            if( !empty( $project_leader['aer_project_leader_photo_highlight'] ) ){
                                                ?><div class="image-highlight"><?php

                                                    echo $project_leader['aer_project_leader_photo_highlight'];

                                                ?></div><?php
                                            }

                                            ?></div><?php

                                        }

                                        echo $project_leader['aer_project_leader_description'];
                                    ?></div>
                                </div><?php

                            }

                            if( !empty( get_field('aer_project_team_members') ) ){

                                ?><div class="team-members columns small-12 medium-5 large-12"><h2>Team Members</h2><?php

                                    echo get_field('aer_project_team_members');

                                ?></div><?php

                            }

                        ?></div>
                    </div>
                    <div class="columns small-12 medium-12 large-9"><?php

                        if( !empty( get_field('aer_project_select_publications') ) ){

                            ?><div class="select-publications aer-accordion"><h2>Publications</h2><?php

                                echo get_field('aer_project_select_publications');

                                ?>
                            </div><?php

                        }

                    ?></div>
                </div><?php

                    if( !empty( get_field('aer_project_grants') ) ){

                        ?><div class="row"><div class="columns small-12 medium-12 large-12"><div class="grants aer-accordion"><h2>Grants</h2><?php

                            echo get_field('aer_project_grants');

                        ?></div></div></div><?php

                    }

                ?>
            </div>
        </article>
    </div>
</div>
<?php
    endwhile;
endif;
get_footer(); ?>
