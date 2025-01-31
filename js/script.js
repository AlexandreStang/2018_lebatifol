document.addEventListener('DOMContentLoaded', function() {

    var menuMobile = false;

    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

    function preventDefault(e) {
        e = e || window.event;
        if (e.preventDefault)
            e.preventDefault();
        e.returnValue = false;
    }

    function preventDefaultForScrollKeys(e) {
        if (keys[e.keyCode]) {
            preventDefault(e);
            return false;
        }
    }

    function disableScroll() {
        if (window.addEventListener) // older FF
            window.addEventListener('DOMMouseScroll', preventDefault, false);
        window.onwheel = preventDefault; // modern standard
        window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
        window.ontouchmove  = preventDefault; // mobile
        document.onkeydown  = preventDefaultForScrollKeys;
    }

    function enableScroll() {
        if (window.removeEventListener)
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.onmousewheel = document.onmousewheel = null;
        window.onwheel = null;
        window.ontouchmove = null;
        document.onkeydown = null;
    }

    document.getElementById("mobile-nav-fullpage").style.display = "none";

    document.getElementById("icon-hamburger").addEventListener("click", function (ev) {
        if (document.getElementById("header-nav").classList.contains('nav-white') || menuMobile) {
            document.getElementById("mobile-nav-fullpage").style.display = "none";
            document.getElementById("header-nav").classList.remove('nav-white');
            menuMobile = false;

            enableScroll();

        } else {
            document.getElementById("mobile-nav-fullpage").style.display = "block";
            document.getElementById("header-nav").classList.add('nav-white');
            menuMobile = true;

            disableScroll();
        }
    });

    if (document.getElementById("pop-up-close")) {

        disableScroll();

        document.getElementById("pop-up-close").addEventListener("click", function (ev) {
            document.getElementById("pop-up-container").style.display = "none";

            enableScroll();

        });
    }

    window.addEventListener("resize", function(event) {
        document.getElementById("mobile-nav-fullpage").style.display = "none";
        document.getElementById("header-nav").classList.remove('nav-white');
        menuMobile = false;

        enableScroll();
    });

    /* -------------------------------------- GALERIE -------------------------------------- */
    if(document.querySelector('.image-galerie')){
        let listeImagesGalerie = document.querySelectorAll('.image-galerie');
        let listeImagesLightbox = document.querySelectorAll('.image-lightbox');

        /* OUVRIR LIGHTBOX*/
        for(let i=0; i<listeImagesGalerie.length; i++){
            listeImagesGalerie[i].addEventListener('click', ouvrirLightbox);
        }

        function ouvrirLightbox(e) {

            let numeroImage = e.target.getAttribute('data-numero-image');
            listeImagesLightbox[numeroImage].classList.add('selected');

            document.querySelector('.lightbox').style.display = "flex";
        }

        /* FERMER LIGHTBOX*/
        document.querySelector('.lightbox').addEventListener('mouseup', fermerLightbox);

        function fermerLightbox(e) {

            let imageSelected = document.querySelector('.selected');
            let boutonPrecedent = document.querySelector('.prec');
            let boutonSuivant = document.querySelector('.suiv');

            if(e.target !== imageSelected && e.target !== boutonPrecedent && e.target !== boutonSuivant){
                document.querySelector('.selected').classList.remove('selected');
                document.querySelector('.lightbox').style.display = "none";
            }
        }

        /* BOUTON SUIVANT */
        document.querySelector('.suiv').addEventListener('click', imageSuivante);

        function imageSuivante(){

            for(let i=0; i<listeImagesLightbox.length; i++){
                if(listeImagesLightbox[i].classList.contains('selected')){
                    document.querySelector('.selected').classList.remove('selected');

                    if(i===listeImagesLightbox.length-1){
                        listeImagesLightbox[0].classList.add('selected');
                        break;
                    }
                    else{
                        listeImagesLightbox[i+1].classList.add('selected');
                        break;
                    }
                }
            }
        }

        /* BOUTON PRECEDENT */
        document.querySelector('.prec').addEventListener('click', imagePrecedente);

        function imagePrecedente(){

            for(let i=0; i<listeImagesLightbox.length; i++){
                if(listeImagesLightbox[i].classList.contains('selected')){
                    document.querySelector('.selected').classList.remove('selected');

                    if(i===0){
                        listeImagesLightbox[listeImagesLightbox.length-1].classList.add('selected');
                        break;
                    }
                    else{
                        listeImagesLightbox[i-1].classList.add('selected');
                        break;
                    }
                }
            }
        }
    }



});
