<?php
 /*Template Name: Research Project
 */

get_header(); ?>
<div id="primary">
    <div id="content" role="main">
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
    <header class="entry-header columns">
        <h1>
            <?php the_title(); ?>
        </h1>
    </header>
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                if ( !empty( get_the_content() ) ) :
                    ?><div class="entry-content columns"><?php
                    the_content();
                    ?></div><?php
                endif;
            endwhile;
        endif;
    ?>
    <div class="entry-content columns"><?php
        $fields = get_fields();
        foreach ($fields as $key => $value){

            if( !empty($value) ){

                echo '<div class="' . $key . '">';

                if( $key == 'project_leader' ){

                    if( !empty( $value['project_leader_name'] ) ){

                        echo '<div class="project_leader_name"><h2>';
                        echo $value['project_leader_name'];
                        echo '</h2></div>';
                        echo '<div class="project_leader_description">';

                        if( !empty( $value['photo'] ) ){
                            echo '<div class="photo"><img';

                            if( !empty( $value['photo']['title'] ) )
                                echo ' title="' . $value['photo']['title'] . '"';

                            if( !empty( $value['photo']['alt'] ) )
                                echo ' alt="' . $value['photo']['alt'] . '"';

                            echo ' src="';
                            echo $value['photo']['sizes']['medium'];
                            echo '">';

                            if( !empty( $value['image_highlight'] ) ){
                                echo '<div class="image_highlight">';
                                echo $value['image_highlight'];
                                echo '</div>';
                            }

                            echo '</div>';
                        }

                        echo $value['project_leader_description'];
                        echo '</div>';

                    }

                } else if( $key == 'project_summary' ){

                    echo '<h2>Summary</h2>';
                    echo $value;

                } else if( $key == 'team_members' ){

                    echo '<h2>Team Members</h2>';
                    echo $value;

                } else if( $key == 'select_publications' ){

                    echo '<h2>Publications</h2>';
                    echo $value;

                } else {

                    echo $value;

                }

                echo '</div>';

            }

        }

    ?></div>
</article>
    </div>
</div>
<?php get_footer(); ?>
