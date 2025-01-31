<?php get_header(); ?>


<!--POP-UP-->
<?php
query_posts(array(
    'post_type' => 'post_ad',
    'post_status' => 'publish',
    'meta_key' => 'en_vedette',
    'meta_value' => 1,
    'showposts' => 1,
    'order' => 'ASC',
    'orderby' => 'date'
));
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <div class="pop-up-container" id="pop-up-container">
            <div class="pop-up">
                <div class="pop-up-close" id="pop-up-close"><i class="fas fa-times"></i></div>
                <div class="row pop-up-content">
                    <div class="pop-up-image col-6">

                        <!-- IMAGES DE LA PUB DESKTOP ET MOBILE -->
                        <picture>
                            <source media="(min-width: 641px)" srcset="<?php the_field('image_desktop') ?>">
                            <source media="(max-width: 640px)"
                                    srcset="<?php the_field('image_mobile') ?>">

                            <img src="<?php the_field('image_desktop')?>">
                        </picture>

                    </div>
                    <div class="col-6">
                        <div class="pop-up-text">

                            <!-- TITRE ET DESCRIPTION DE LA PUB -->
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_field('court_texte_01') ?></p>
                            <p><?php the_field('court_texte_02') ?></p>


                            <?php if (have_rows('bouton_01')): ?>

                                <!-- BOUCLE DANS LE CONTENU DE CONFERENCIER_MEDIAS_SOCIAUX -->
                                <?php while (have_rows('bouton_01')): the_row(); ?>

                                    <a href="<?php the_sub_field('lien_bouton') ?>" class="button"><?php the_sub_field('titre_bouton') ?></a>

                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php if (have_rows('bouton_02')): ?>

                                <!-- BOUCLE DANS LE CONTENU DE CONFERENCIER_MEDIAS_SOCIAUX -->
                                <?php while (have_rows('bouton_02')): the_row(); ?>

                                    <a href="<?php the_sub_field('lien_bouton') ?>" class="button-reverse"><?php the_sub_field('titre_bouton') ?></a>

                                <?php endwhile; ?>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_query(); ?>


<!--ZONE HERO-->
<div class="hero-index hero" style="background-image: url(<?php the_field('hero_fond', 'option'); ?>); background-size: cover; background-repeat: no-repeat; background-position: center center">
    <div class="hero-content wrapper">
        <h1><?php the_field('hero_titre', 'option'); ?></h1>
        <p><?php the_field('hero_texte_introduction', 'option'); ?></p>
        <a href="<?php the_field('hero_bouton_lien', 'option'); ?>" class="button"><?php the_field('hero_bouton_titre', 'option'); ?></a>
    </div>
</div>


<!--SECTION D'INTRODUCTION-->
<section class="index section-about">
    <div class="section-about-text wrapper">
        <h2><?php the_field('intro_titre', 'option'); ?></h2>
        <p><?php the_field('intro_description', 'option'); ?></p>

        <div class="section-button">
            <a href="<?php the_field('intro_bouton_lien', 'option'); ?>" class="button"><?php the_field('intro_bouton_titre', 'option'); ?></a>
        </div>
    </div>
    <div class="section-about-slideshow">


        <picture>
            <source media="(min-width: 769px)" srcset="<?php the_field('intro_image_desktop', 'option'); ?>">
            <source media="(min-width: 641px)" srcset="<?php the_field('intro_image_mobile', 'option'); ?>">
            <source media="(max-width: 640px)" srcset="<?php the_field('intro_image_mobile', 'option'); ?>">

            <img src="<?php the_field('intro_image_desktop', 'option'); ?>">
        </picture>

    </div>
</section>


<!--MENU EN VEDETTE-->
<section class="index section-menu wrapper">

    <?php
    query_posts(array(
        'post_type' => 'post_menu',
        'post_status' => 'publish',
        'meta_key' => 'en_vedette',
        'meta_value' => 1,
        'showposts' => 1
    ));
    ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <!-- TITRE DU MENU EN VEDETTE -->
            <h2><?php the_title(); ?></h2>

            <div class="menu-col">

                <?php if (have_rows('menu')): ?>

                    <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
                    <?php while (have_rows('menu')): the_row(); ?>

                        <div>

                            <!-- TITRE DE LA SOUS-CATÉGORIE DU MENU -->
                            <h3><?php the_sub_field('sous_categorie') ?></h3>

                            <?php if (have_rows('repas')): ?>

                                <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
                                <?php while (have_rows('repas')): the_row(); ?>

                                    <div class="menu-meal row">
                                        <div>
                                            <div class="meal-name">
                                                <?php the_sub_field('repas_nom') ?>
                                            </div>
                                            <div class="meal-desc">
                                                <?php the_sub_field('repas_description') ?>
                                            </div>
                                        </div>
                                        <div class="meal-price">

                                            <!-- VÉRIFICATION SI LE PRODUIT EST INCLUS OU ACHETABLE -->
                                            <?php if (get_sub_field('produit_inclus')): ?>

                                                <?php echo "Inclus" ?>

                                            <?php else: ?>

                                                <?php the_sub_field('repas_prix') ?><sup>
                                                <?php echo "." ?>

                                                <!-- AJOUT D'UN 0 DANS LE CAS OU LE PRIX N'A PAS DE CENTIME -->
                                                <?php if (get_sub_field('repas_centimes') == 0): ?>
                                                    <?php echo "00" ?>

                                                <?php else: ?>
                                                    <?php the_sub_field('repas_centimes') ?>

                                                <?php endif; ?>

                                                <?php echo "$" ?></sup>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>
