<?php get_header(); ?>

    <div class="hero" style="background: url(<?php the_field('menu_page_fond'); ?>); background-size: cover; background-position: center;">
        <div class="hero-content hero-menusList wrapper">
            <h1><?php the_title(); ?></h1>
            <p><?php the_field('menu_page_texte'); ?></p>
        </div>
    </div>

    <section class="section-menu wrapper">

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

    </section>

<?php get_footer(); ?>