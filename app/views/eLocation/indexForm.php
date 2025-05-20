<!doctype html>
<html lang="fr">

  <head>
    <title>eLocation &mdash; Page Principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- MDB Bootstrap Bundle JS (optionnel si tu utilises MDB) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="static/css/owl.carousel.min.css">
    <link rel="stylesheet" href="static/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="static/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="static/css/aos.css">

    <link rel="stylesheet" href="static/fonts/icomoon/style.css">
    <link rel="stylesheet" href="static/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../app/views/eLocation/css/style1.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="" role="banner">
        <nav class="navbar navbar-dark bg-dark sticky-top">
          <div class="container-fluid">
            <!-- Bouton Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo -->
            <!-- <a class="navbar-brand ms-3" href="index.php?controller=eLocation&action=acceuilForm">eLocation</a> -->

            <!-- Navbar Offcanvas -->
            <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Location Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?controller=eLocation&action=acceuilForm"><i class="fas fa-house-user fa-lg"></i> Accueil</a>
                  </li>
                  <hr>
                  <h6>Services en ligne</h6>
                  <li class="nav-item"><a class="nav-link" href="index.php?controller=eLocation&action=addVoitureForm"><i class="fas fa-car fa-lg"></i> Ajouter une voiture</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?controller=eLocation&action=deleteForm"><i class="fas fa-rectangle-xmark fa-lg"></i> Supprimer une voiture</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?controller=eLocation&action=updateVoitureForm"><i class="fas fa-address-card fa-lg"></i> Modifier une voiture</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php?controller=eLocation&action=deleteRentForm"><i class="fas fa-circle-check fa-lg"></i> Retourner une voiture</a></li>
                  <hr>
                  <h6>Autres</h6>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOffcanvas" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fa-user fa-lg"></i> Profile
                    </a>
                    <ul class="dropdown-menu me-2 me-lg-2">
                                    <li>
                                        &nbsp;&nbsp;<b style="font-size: 0.85em;">Mes informations :</b>
                                        <a class="dropdown-item" href="index.php?controller=autres&action=profileForm">
                                            Consulter
                                        </a>
                                        <a class="dropdown-item" href="index.php?controller=autres&action=profilePhotoForm">
                                            Changer ma photo
                                        </a>
                                        &nbsp;&nbsp;<b style="font-size: 0.85em;">Compte eLocation :</b>
                                        <a class="dropdown-item" href="index.php?controller=auth&action=changePassword">
                                            Changer mot de passe
                                        </a>
                                    </li>
                                </ul>
                  </li>
                </ul>
              </div>
            </div>

            <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              <nav class="navbar navbar-expand-lg sticky-top" role="navigation">
              <div class="container-fluid">
                <ul class="navbar-nav d-flex flex-row">
                  <li class="active"><a href="index.php?controller=eLocation&action=acceuilForm" class="nav-link text-white">Accueil</a></li>
                  <li><a href="index.php?controller=eLocation&action=servicesForm" class="nav-link text-white">Services</a></li>
                  <li><a href="index.php?controller=eLocation&action=carsForm" class="nav-link text-white">Voitures</a></li>
                  <li class="active"><a href="index.php?controller=eLocation&action=contactForm" class="nav-link text-white">Contacte</a></li>
                  <li class="nav-item">
                                <button class="nav-link text-white position-relative" type="button" title="Consulter vos messages" id="liveToastBtn" href="#"> 
                                    Messages
                                    <span class="position-absolute top-0 start-0 p-2 bg-danger border border-light rounded-circle"></span>
                                </button>
                                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                        <i class="fas fa-bell fa-mx"></i>&nbsp;&nbsp;
                                            <strong class="me-auto">eLocation</strong>
                                            <small>11 mins ago</small>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                        Bonjour Monsieur,
                                        Nous espérons que vous pourrez retourner le véhicule dans les plus brefs délais, car le temps imparti est désormais écoulé.
                                        </div>
                                    </div>
                                </div>
                                <!-- Script pour activer le Toast -->
                                <script>
                                    const toastTrigger = document.getElementById('liveToastBtn')
                                    const toastLive = document.getElementById('liveToast')

                                    if (toastTrigger) {
                                      toastTrigger.addEventListener('click', () => {
                                        const toast = new bootstrap.Toast(toastLive)
                                        toast.show()
                                      })
                                    }
                                </script>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" title="Consulter votre profile" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile 
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="index.php?controller=autres&action=profileForm">
                                        <i class="fas fa-address-card fa-sm"></i> Mon compte
                                    </a></li>
                                    <li><a class="dropdown-item" href="index.php?controller=auth&action=changePassword">
                                        <i class="fas fa-arrows-rotate fa-sm"></i> Changer mot de passe
                                    </a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.php?controller=auth&action=logout">
                                        <i class="fas fa-arrow-right-from-bracket fa-sm"></i> Se déconnecter
                                    </a></li>
                                </ul>
                            </li>
                </ul>
                </div>
              </nav>
          </div>
        </nav>
      </header>

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay" style="background-image: url('uploads/imagesVoiture/hero_1')">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-5">
              <div class="feature-car-rent-box-1">
                <h3>Range Rover S7</h3>
                <ul class="list-unstyled">
                  <li>
                    <span>Portes</span>
                    <span class="spec">4</span>
                  </li>
                  <li>
                    <span>Place</span>
                    <span class="spec">6</span>
                  </li>
                  <li>
                    <span>Bagage</span>
                    <span class="spec">2 Valises/2 Sacs</span>
                  </li>
                  <li>
                    <span>Transmission</span>
                    <span class="spec">Automatique</span>
                  </li>
                  <li>
                    <span>Âge minimum</span>
                    <span class="spec">18 ans</span>
                  </li>
                </ul>
                <div class="d-flex align-items-center bg-light p-3 position-relative">
                  <span>$150/jour</span>
                  <a href="contact.html" class="ml-auto btn btn-primary position-absolute top-50 end-0 translate-middle-y">Louer Maintenant</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section pt-0 pb-0 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-12">
            
              <form class="trip-form">
                <div class="row align-items-center mb-4">
                  <div class="col-md-6">
                    <h3 class="m-0">Commencez votre voyage ici</h3>
                  </div>
                  <div class="col-md-6 text-md-right position-relative">
                    <div class="position-absolute top-50 end-0 translate-middle-y">
                      <span class="text-primary">32</span> <span>voitures disponibles</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label for="cf-1">Où viens-tu</label>
                    <input type="text" id="cf-1" placeholder="Votre adresse de retrait" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-2">Où vous allez</label>
                    <input type="text" id="cf-2" placeholder="Votre adresse de dépôt" class="form-control">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-3">Date du voyage</label>
                    <input type="text" id="cf-3" placeholder="Votre date de retrait" class="form-control datepicker px-3">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cf-4">Date de retour</label>
                    <input type="text" id="cf-4" placeholder="Votre date de voyage" class="form-control datepicker px-3">
                  </div>
                </div><br>
                <div class="row">
                  <div class="col-lg-6">
                    <input type="submit" value="Soumettre" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>

    

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h3>Nos offres</h3>
            <p class="mb-4">Nous mettons à votre disposition un large choix de véhicules adaptés à tous vos besoins : <br>

              ✅ <b>Voitures économiques</b> pour vos trajets quotidiens ou déplacements courts; <br>
              
              ✅ <b>Berlines confortables</b> pour vos voyages professionnels ou familiaux; <br>
              
              ✅ <b>SUV et 4x4</b> pour plus de puissance et de liberté; <br>
              
              ✅ <b>Véhicules de luxe</b> pour des occasions spéciales ou des déplacements haut de gamme.</p>
            <p>
              <a href="#" class="btn btn-primary custom-prev">Précédent</a>
              <span class="mx-2">/</span>
              <a href="#" class="btn btn-primary custom-next">Suivant</a>
            </p>
          </div>
          <div class="col-lg-8">
            <div class="nonloop-block-13 owl-carousel">
              <div class="item-1">
                <a href="#"><img src="uploads/imagesVoiture/img_1" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">Range Rover S64 Coupe</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>$250/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Doors</span>
                      <span class="spec">4</span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec">5</span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec">Automatic</span>
                    </li>
                    <li>
                      <span>Minium age</span>
                      <span class="spec">18 years</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="contact.html" class="btn btn-primary">Rent Now</a>
                  </div>
                </div>
              </div>


              <div class="item-1">
                <a href="#"><img src="uploads/imagesVoiture/img_2" alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#">Range Rover S64 Coupe</a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span>$250/</span>day</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Doors</span>
                      <span class="spec">4</span>
                    </li>
                    <li>
                      <span>Seats</span>
                      <span class="spec">5</span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec">Automatic</span>
                    </li>
                    <li>
                      <span>Minium age</span>
                      <span class="spec">18 years</span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="contact.html" class="btn btn-primary">Rent Now</a>
                  </div>
                </div>
              </div>

            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section section-3" style="background-image: url('uploads/imagesVoiture/hero_2');">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h2 class="text-white">Nos services</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-car-1"></span>
              </span>
              <div class="service-1-contents">
                <h3 class="text-white">Réparation</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-traffic"></span>
              </span>
              <div class="service-1-contents">
                <h3 class="text-white">Accessoires de voiture</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-valet"></span>
              </span>
              <div class="service-1-contents">
                <h3 class="text-white">Posséder une voiture</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container site-section mb-5">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
          <h2>Comment ça marche?</h2>
          <p>Le processus se déroule comme suit:</p>
        </div>
      </div>
      <div class="how-it-works d-flex">
        <div class="step">
          <span class="number"><span>01</span></span>
          <span class="caption">Heure &amp; lieu</span>
        </div>
        <div class="step">
          <span class="number"><span>02</span></span>
          <span class="caption">Voiture</span>
        </div>
        <div class="step">
          <span class="number"><span>03</span></span>
          <span class="caption">Détails</span>
        </div>
        <div class="step">
          <span class="number"><span>04</span></span>
          <span class="caption">Vérifier</span>
        </div>
        <div class="step">
          <span class="number"><span>05</span></span>
          <span class="caption">Tout à Fait</span>
        </div>

      </div>
    </div>
    
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-7 text-center mb-5">
            <h2>Témoignage client</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Franchement, l'application est super intuitive ! J'ai pu réserver une voiture en moins de 5 minutes. Tout était clair, rapide et sécurisé. Je recommande vivement pour ceux qui cherchent à louer sans prise de tête."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="uploads/imagesProfile/person_1" alt="Image" class="img-fluid mr-3">
                <span>&nbsp;&nbsp;Youssef B. – Rabat</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Service client très réactif, voitures en bon état et prix compétitifs. J'avais un doute au début, mais dès ma première location, j'ai été convaincu. Bravo à toute l'équipe !"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="uploads/imagesProfile/person_2" alt="Image" class="img-fluid mr-3">
                <span>&nbsp;&nbsp;Fatima E. – Casablanca</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"L'expérience utilisateur est fluide, même pour une première fois. La recherche par modèle ou marque est pratique, et j'ai beaucoup aimé le système de retour de véhicule via l'application."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="uploads/imagesProfile/person_3" alt="Image" class="img-fluid mr-3">
                <span>&nbsp;&nbsp;Nadia K. – Tanger</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h1 class="footer-heading mb-4">À propos</h1>
            <p>eLocation est une plateforme en ligne dédiée à la location de voitures, offrant un service rapide, simple et sécurisé. Nous proposons une large gamme de véhicules adaptés à tous les besoins, avec un accompagnement client de qualité et des offres claires. Notre objectif : rendre la mobilité accessible à tous.</p>
            <div class="row list-unstyled social align-items-center">
              <div class="col-2">
                <a href="#"><span class="icon-facebook"></span></a>
              </div>
              <div class="col-2">
                <a href="#"><span class="icon-instagram"></span></a>
              </div>
              <div class="col-2">
                <a href="#"><span class="icon-twitter"></span></a>
              </div>
              <div class="col-2">
                <a href="#"><span class="icon-linkedin"></span></a>
              </div>              
            </div>
          </div>
          <div class="col-lg-6 container ml-auto">
            <div class="row">
              <div class="col-lg-6 container">
                <h1 class="footer-heading mb-4">Nos Coordonnées</h1>
                <ul class="list-unstyled">
                  <li><a href="#"><span class="icon-verified_user p-2"></span>34 Street Name, City Name Here, United States</a></li>
                  <li><a href="#"><span class="icon-phone p-2"></span>+1 242 4942 290</a></li>
                  <li><a href="#"><span class="icon-message p-2"></span>Admin@gmail.com</a></li>
                  <li><a href="#"><span class="icon-watch_later p-2"></span>8:00-18:00, Sam-Dim: Fermé</a></li>
                </ul>
            </div>
          </div>
        </div>
        <div class="row container pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                Copyright &copy;2025 All rights reserved | This template is made by <i class="text-light" aria-hidden="true">Ilyas BEL EL YAZID</i>
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="static/js/jquery-3.3.1.min.js"></script>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/owl.carousel.min.js"></script>
    <script src="static/js/jquery.sticky.js"></script>
    <script src="static/js/jquery.waypoints.min.js"></script>
    <script src="static/js/jquery.animateNumber.min.js"></script>
    <script src="static/js/jquery.fancybox.min.js"></script>
    <script src="static/js/jquery.easing.1.3.js"></script>
    <script src="static/js/bootstrap-datepicker.min.js"></script>
    <script src="static/js/aos.js"></script>

    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../app/views/eLocation/js/main.js"></script>

  </body>

</html>

