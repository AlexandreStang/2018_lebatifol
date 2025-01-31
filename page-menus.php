
<?php get_header(); ?>

<div class="hero" style="background: url(<?php the_field('page_fond'); ?>); background-size: cover; background-position: center;">
    <div class="hero-content hero-menusList wrapper">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('page_texte'); ?></p>
    </div>
</div>

<section class="section-menusList wrapper">

    <?php
    query_posts(array(
        'post_type' => 'post_menu',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'date',
        'showposts' => 5
    ));
    ?>
    <?php if( have_posts() ) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail("menu-list"); ?>
                    <div class="menu-title">
                        <span><?php the_title(); ?></span>
                    </div>
                </a>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php wp_reset_query(); ?>



</section>

<?php get_footer(); ?>