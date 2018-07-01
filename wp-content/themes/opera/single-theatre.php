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

    <aside>
        <section class="opera-section">
            <div class="container">
                <h2>Najbliższe spektakle:</h2>
                <div class="row">

                </div>
            </div>
        </section>
    </aside>

<?php get_footer(); ?>