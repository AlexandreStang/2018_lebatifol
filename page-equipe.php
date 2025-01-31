<?php get_header(); ?>

<div class="hero" style="background: url(<?php the_field('page_fond'); ?>); background-size: cover;     background-position-y: 95%;">
    <div class="hero-content hero-menusList wrapper" >
        <h1><?php the_title(); ?></h1>
        <p><?php the_field('page_texte'); ?></p>
    </div>
</div>

<section class="wrapper section-equipe">
  <?php
  query_posts(array(
      'post_type' => 'batifol_equipe',
      'post_status' => 'publish',
      'order' => 'ASC',
      'orderby' => 'date',
      'showposts' => 3
  ));
  ?>
  <?php if( have_posts() ) : ?>
      <?php while (have_posts()) : the_post(); ?>
  <article><div><img src="<?php the_field('photo'); ?>" alt=""><h2><?php the_title(); ?></h2><p><?php the_field('description'); ?></p></div><a class="button" href="<?php the_field('site'); ?>"><?php the_field('site'); ?></a></article>

<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>
