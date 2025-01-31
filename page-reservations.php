<?php get_header(); ?>

<div class="hero" class="hero" style="background: url(<?php the_field('page_fond'); ?>); background-size: cover;     background-position-y: 50%;">
    <div class="hero-content hero-menusList wrapper">
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('page_texte'); ?></p>
    </div>
</div>
<?php
query_posts(array(
    'post_type' => 'batifol_reservation',
    'post_status' => 'publish',
    'order' => 'ASC',
    'orderby' => 'date',
    'showposts' => 1
));
?>
<section class="reservation section-about">
    <div class="section-about-text wrapper">

        <?php if( have_posts() ) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>

    </div>
</section>


<section class="section-menu wrapper">
  <div class="menu-col">

  <?php if (have_rows('menu_reservation')): ?>
      <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
      <?php while (have_rows('menu_reservation')): the_row(); ?>
            <div>
              <!-- TITRE DE LA SOUS-CATÉGORIE DU MENU -->
              <h3><?php the_sub_field('sous_categorie') ?></h3>

              <?php if (have_rows('reservation')): ?>

                  <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
                  <?php while (have_rows('reservation')): the_row(); ?>

                      <div class="menu-meal row">
                          <div>
                              <div class="meal-name">
                                  <?php the_sub_field('reservation_nom') ?>
                              </div>
                              <div class="meal-desc">
                                  <?php the_sub_field('reservation_description') ?>
                              </div>
                          </div>

                          <div class="meal-price">

                              <!-- VÉRIFICATION SI LE PRODUIT EST INCLUS OU ACHETABLE -->
                              <?php if (get_sub_field('produit_inclus')): ?>

                                  <?php echo "Inclus" ?>

                              <?php else: ?>

                                  <?php the_sub_field('reservation_prix') ?><sup>
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




<?php if (have_rows('contact_reservation')): ?>
    <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
    <?php while (have_rows('contact_reservation')): the_row(); ?>
<section class="section-reservation" style="background-image: url(<?php the_sub_field('image_fond'); ?>); background-size: cover;">

    <div class="content-reservation" >
        <h2><?php the_sub_field('titre') ?></h2>

        <p><?php the_sub_field('avertissement') ?>
          <?php if (have_rows('grand_groupe')): ?>
              <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
              <?php while (have_rows('grand_groupe')): the_row(); ?>
        </br>et</br>
          <?php the_sub_field('instruction') ?></br>
          <span><?php the_sub_field('telephone') ?></span>

        </p>

      <?php endwhile; ?>
      <?php endif; ?>
        <div>
          <?php if (have_rows('petit_groupe')): ?>
              <!-- BOUCLE DANS LE CONTENU DU GROUPE MENU -->
              <?php while (have_rows('petit_groupe')): the_row(); ?>
        <p><?php the_sub_field('instruction') ?></p>
        <a href="<?php the_sub_field('lien') ?>" class="button-reverse">Réserver maintenant</a>
      <?php endwhile; ?>
      <?php endif; ?>
        </div>
    </div>
</section>
<?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>
