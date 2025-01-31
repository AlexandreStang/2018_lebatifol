<?php get_header(); ?>

    <div class="hero"
         style="background: url(<?php the_field('page_fond'); ?>); background-size: cover; background-position: center;">
        <div class="hero-content hero-menusList wrapper">
            <h1><?php the_title(); ?></h1>
            <p><?php the_field('page_texte'); ?></p>
        </div>
    </div>

    <section class="section-aPropos wrapper" style="overflow: auto;">
        <?php if( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; ?>
        <?php endif; ?>
    </section>

<?php get_footer(); ?>