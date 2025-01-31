<?php get_header(); ?>

<div class="hero" style="background: url(<?php the_field('page_fond'); ?>); background-size: cover; background-position: center;">
    <div class="hero-content hero-galerie wrapper">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('page_texte'); ?></p>
    </div>
</div>

<div class="wrapper">

    <!-- IMAGES CLIQUABLES -->
    <section class="section-galerie">
        <?php
        $numeroImage = 0;

        query_posts(array(
            'post_type' => 'batifol_img_galerie',
            'post_status' => 'publish',
            'showposts' => 20,
            'order' => asc
        ));
        ?>
        <?php if( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div class="image-galerie" data-numero-image="<?php echo $numeroImage; ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
                <?php $numeroImage++; ?>

            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

    </section>
</div>

<!-- LIGHTBOX -->
<div class="lightbox">
    <div class="wrapper wrapper-lightbox">
        <!-- BOUTON FERMER -->
        <span class="fermer">&times;</span>

        <!-- IMAGES -->
        <?php
        query_posts(array(
            'post_type' => 'batifol_img_galerie',
            'post_status' => 'publish',
            'showposts' => 20,
            'order' => asc
        ));
        ?>
        <?php if( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <img class="image-lightbox" src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php echo get_the_title(); ?>">

            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <!-- BOUTONS SUIVANT/PRECEDENT -->
        <span class="prec">&#10094;</span>
        <span class="suiv">&#10095;</span>
    </div>

</div>

<?php get_footer(); ?>
