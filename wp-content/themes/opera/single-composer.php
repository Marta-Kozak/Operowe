<?php get_header(); ?>

    <section class="bg-light text-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    if( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            /* Post */
                            the_title('<h2 class="headline">', '</h2>');
                            the_content();
                        }
                    } else {
                        /* No posts found */
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

        <section class="opera-section">
            <div class="container">
                <h2>Obecnie w repertuarze:</h2>
                <div class="row">
                    <?php

                    // get the custom post type's taxonomy terms

                    $custom_taxterms = wp_get_object_terms( $post->ID, 'title', array('fields' => 'ids') );
                    // arguments
                    $args = array(
                        'post_type' => 'opera',
                        'post_status' => 'publish',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'title',
                                'field' => 'id',
                                'terms' => $custom_taxterms
                            )
                        ),
                        'post__not_in' => array ($post->ID),
                    );
                    $related_items = new WP_Query( $args );
                    // loop over query
                    if ($related_items->have_posts()) :
                        echo '<ul>';
                        while ( $related_items->have_posts() ) : $related_items->the_post();
                            ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php
                        endwhile;
                        echo '</ul>';
                    endif;
                    // Reset Post Data
                    wp_reset_postdata();
                    ?>

                </div>
            </div>
        </section>

<?php get_footer(); ?>