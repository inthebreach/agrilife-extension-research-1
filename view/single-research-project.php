<?php
 /*Template Name: Research Project
 */

// Queue styles
add_action( 'wp_enqueue_scripts', 'aer_project_register_styles' );
add_action( 'wp_enqueue_scripts', 'aer_project_enqueue_styles' );

if(get_the_post_thumbnail()){

    add_action( 'genesis_seo_title', 'aer_remove_header_title' );
    add_action( 'genesis_site_title', 'aer_featured_image_in_header' );

}

function aer_project_register_styles(){

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

function aer_remove_header_title(){

    $title = '';
    return $title;

}

function aer_featured_image_in_header(){

    ?><div class="research-project-featured-image"><?php

       the_post_thumbnail( 'full' );

    ?></div><?php

};

get_header(); ?>
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
                    <div class="columns small-12 medium-12 large-9"><?php

                        $fields = get_fields();

                        if( !empty( $fields['project_summary'] ) ){

                            ?><div class="project-summary"><?php

                                if( !empty( $fields['project_summary_2'] ) ){

                                    ?><div class="project-summary-2"><?php

                                        echo $fields['project_summary_2'];

                                    ?></div><?php

                                }

                                echo $fields['project_summary'];

                            ?></div><?php

                        }

                        if( !empty( $fields['current_research_projects'] ) ){

                            foreach ($fields['current_research_projects'] as $key => $value) {

                                ?><div class="aer-accordion"><?php

                                    echo $value['research_project'];

                                    ?>
                                    <div class="aer-accordion-button"><a href="javascript:;" onclick="this.parentNode.parentNode.classList.toggle('aer-accordion-open');">Expand</a></div>
                                </div><?php

                            }

                        }

                        ?>
                    </div>
                    <div class="columns research-right small-12 medium-12 large-3">
                        <div class="row"><?php

                            $project_leader = $fields['project_leader'];

                            if( !empty( $project_leader ) && !empty( $project_leader['project_leader_name'] ) ){

                                ?><div class="project-leader columns small-12 medium-7 large-12">
                                    <div class="project-leader-name"><h2><?php
                                        echo $project_leader['project_leader_name'];
                                    ?></h2></div><?php
                                    ?><div class="project-leader-description"><?php

                                        if( !empty( $project_leader['photo'] ) ){

                                            ?><div class="photo small-only-text-right medium-only-text-right"><img<?php

                                            if( !empty( $project_leader['photo']['title'] ) )
                                                ?> title="<?php echo $project_leader['photo']['title'] ?>"<?php

                                            if( !empty( $project_leader['photo']['alt'] ) )
                                                ?> alt="<?php echo $project_leader['photo']['alt']; ?>"<?php

                                            ?> src="<?php echo $project_leader['photo']['sizes']['medium']; ?>"><?php

                                            if( !empty( $project_leader['image_highlight'] ) ){
                                                ?><div class="image-highlight"><?php

                                                    echo $project_leader['image_highlight'];

                                                ?></div><?php
                                            }

                                            ?></div><?php

                                        }

                                        echo $project_leader['project_leader_description'];
                                    ?></div>
                                </div><?php

                            }

                            if( !empty( $fields['team_members'] ) ){

                                ?><div class="team-members columns small-12 medium-5 large-12"><h2>Team Members</h2><?php

                                    echo $fields['team_members'];

                                ?></div><?php

                            }

                        ?></div>
                    </div>
                    <div class="columns small-12 medium-12 large-9"><?php

                        if( !empty( $fields['select_publications'] ) ){

                            ?><div class="select-publications aer-accordion"><h2>Publications</h2><?php

                                echo $fields['select_publications'];

                                ?>
                                <div class="aer-accordion-button"><a href="javascript:;" onclick="this.parentNode.parentNode.classList.toggle('aer-accordion-open');">Expand</a></div>
                            </div><?php

                        }

                    ?></div>
                </div>
            </div>
        </article>
    </div>
</div>
<?php get_footer(); ?>
