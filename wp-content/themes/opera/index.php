<?php get_header() ?>

<section id="opera" class="primary">
    <div class="container">

        <h2 class="headline">W repertuarze</h2>

        <div class="row">
            <?php
            $q = new WP_Query([
                'post_type' => 'opera',
                'posts_per_page' => 3,
                'orderby' => 'date'
            ])
            ?>

            <?php if ($q->have_posts() ) : while ($q->have_posts() ) :    $q->the_post(); ?>
                <!-- post -->
                <div class="col-md-4">
                    <h3 class="post-headline"><?php the_title(); ?></h3>
                    <p class="post-excerpt"><?php the_excerpt();?></p>
                    <a class="btn btn-secondary" href="<?php the_permalink(); ?>">Czytaj dalej</a>
                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>
    </div>
</section>

<section id="calendar" class="primary">
    <div class="container">

        <h2 class="headline">Najbliższe spektakle
        </h2>

        <div class="row">
            <?php
            $q = new WP_Query([
                'post_type' => 'event',
                'posts_per_page' => 3,
                'orderby' => 'date'
            ])
            ?>

            <?php if ($q->have_posts() ) : while ($q->have_posts() ) :    $q->the_post(); ?>
                <!-- post -->
                <div class="col-md-4">
                    <h3 class="post-headline"><?php the_title(); ?></h3>
                    <p class="post-excerpt"><?php the_excerpt();?></p><br>
                    <a class="btn btn-secondary" href="<?php the_permalink(); ?>">Czytaj dalej</a>
                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>

    </div>
</section>

<section id="radio" class="primary">
    <div class="container">
        <h2 class="headline">Najbliższe audycje radiowe</h2>

        <div class="row">
            <?php
            $q = new WP_Query([
                'post_type' => 'event',
                'posts_per_page' => 3,
                'orderby' => 'date'

            ])
            ?>

            <?php if ($q->have_posts() ) : while ($q->have_posts() ) :    $q->the_post(); ?>
                <!-- post -->
                <div class="col-md-4">
                    <h3 class="post-headline"><?php the_title(); ?></h3>
                    <p class="post-excerpt"><?php the_excerpt();?></p><br>
                    <a class="btn btn-secondary" href="<?php the_permalink(); ?>">Czytaj dalej</a>
                </div>
            <?php endwhile; ?>
                <!-- post navigation -->
            <?php else: ?>
                <!-- no posts found -->
            <?php endif; ?>
        </div>

    </div>
</section>

<?php get_sidebar()?>

<?php get_footer() ?>