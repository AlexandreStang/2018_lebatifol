<footer>
  <div class="footer-map">
    <div id="map" class="footer-map"></div>
    <style>
   /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
   #map {
     height: 360px;
     max-width: 100%;
   }

   .map{
     color: black;
   }
    </style>

  </div>
  <div class="footer-location">
    <div class="wrapper">
      <h2><?php the_field('footer_nom_etablissement', 'option'); ?></h2>

      <!--COLONNES PRINCIPALES-->
      <div class="footer-col">

        <div class="footer-general">

          <!--LOCATION-->
          <div class="row">

            <div class="footer-icons col-1">
              <i class="fas fa-map-marker-alt"></i>
            </div>

            <div class="col-10 col-offset-1">
              <div>
                <span class="footer-hightlight"><?php the_field('footer_titre', 'option'); ?></span></div>
              <div><?php the_field('footer_coordonnes', 'option'); ?></div>
            </div>
          </div>

          <!--NUMÉRO DE TÉLÉPHONE-->
          <div class="footer-general-phone row">

            <div class="footer-icons col-1">
              <i class="fas fa-phone"></i>
            </div>

            <div class="col-10 col-offset-1">
              <span class="footer-hightlight"><?php the_field('footer_numero_telephone', 'option'); ?></span>
            </div>
          </div>

          <!--COURRIEL-->
          <div class="footer-general-email row">

            <div class="footer-icons col-1">
              <i class="far fa-envelope"></i>
            </div>

            <div class="col-10 col-offset-1">
              <?php the_field('footer_courriel', 'option'); ?>
            </div>
          </div>
        </div>

        <div class="footer-schedule">
          <div class="row">

            <div class="footer-icons col-1">
              <i class="far fa-clock"></i>
            </div>

            <div class="col-10 col-offset-1">
              <div>
                <span class="footer-hightlight"><?php the_field('footer_horaire_titre', 'option'); ?></span></div>
              <div class="footer-hours">
                <?php
                  if( have_rows('footer_horaire', 'option') ):
                    while ( have_rows('footer_horaire', 'option') ) : the_row();
                      ?>
                        <div class="row">
                          <div><?php  the_sub_field('footer_journees');?></div>
                          <div>
                            <span class="footer-hightlight"><?php  the_sub_field('footer_heure_ouverture');?>&nbsp;- &nbsp;<?php  the_sub_field('heure_de_fermeture');?></span></div>
                        </div>
                      <?php
                    endwhile;
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>

        <div class="footer-social">
          <div>
            <span class="footer-hightlight"><?php the_field('footer_infolettre_titre', 'option'); ?></span></div>
          <div><?php the_field('footer_infolettre_texte', 'option'); ?></div>
          <div>
            <form action="" method="get" name="newsletter" onsubmit="" class="row">
              <input type="email" id="email" name="email" placeholder="Adresse courriel..." required="required">
              <button type="submit">Envoyer</button>
            </form>
          </div>
          <div class="footer-socialNetworks">
            <a href="<?php the_field('footer_facebook', 'option'); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                <path d="M0 0v24h24v-24h-24zm16 7h-1.923c-.616 0-1.077.252-1.077.889v1.111h3l-.239 3h-2.761v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"/>
              </svg>
            </a>
            <a href="<?php the_field('footer_instagram', 'option'); ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24">
                <path
                  d="M14.667 12c0 1.473-1.194 2.667-2.667 2.667-1.473 0-2.667-1.193-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667zm3.846-3.232c.038.843.046 1.096.046 3.232s-.008 2.389-.046 3.233c-.1 2.15-1.109 3.181-3.279 3.279-.844.038-1.097.047-3.234.047-2.136 0-2.39-.008-3.232-.046-2.174-.099-3.181-1.132-3.279-3.279-.039-.845-.048-1.098-.048-3.234s.009-2.389.047-3.232c.099-2.152 1.109-3.181 3.279-3.279.844-.039 1.097-.047 3.233-.047s2.39.008 3.233.046c2.168.099 3.18 1.128 3.28 3.28zm-2.405 3.232c0-2.269-1.84-4.108-4.108-4.108-2.269 0-4.108 1.839-4.108 4.108 0 2.269 1.84 4.108 4.108 4.108 2.269 0 4.108-1.839 4.108-4.108zm1.122-4.27c0-.53-.43-.96-.96-.96s-.96.43-.96.96.43.96.96.96c.531 0 .96-.43.96-.96zm6.77-7.73v24h-24v-24h24zm-4 12c0-2.172-.009-2.445-.048-3.298-.131-2.902-1.745-4.52-4.653-4.653-.854-.04-1.126-.049-3.299-.049s-2.444.009-3.298.048c-2.906.133-4.52 1.745-4.654 4.653-.039.854-.048 1.127-.048 3.299 0 2.173.009 2.445.048 3.298.134 2.906 1.746 4.521 4.654 4.654.854.039 1.125.048 3.298.048s2.445-.009 3.299-.048c2.902-.133 4.522-1.745 4.653-4.654.039-.853.048-1.125.048-3.298z"/>
              </svg>
            </a>
          </div>
        </div>
      </div>
      <a href="<?php the_field('footer_copyright_lien', 'option'); ?>">
        <p class="copyright"><?php the_field('footer_copyright', 'option'); ?></p>
      </a>
    </div>
  </div>
</footer>


<!--<link type="text/javascript" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/slick/slick.css">-->
<!--<link type="text/javascript" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/js/slick/slick-theme.css">-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCthig9kaaPQVBeMvm8SLSjCy2EakiHwnU&callback=initMap&libraries=places" async defer></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/map.js"></script>


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>

<?php wp_footer(); ?>

</body>
</html>
