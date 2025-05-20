<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une voiture</title>

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

    <link rel="stylesheet" href="static/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="static/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../app/views/eLocation/css/style1.css">
</head>
<?php 
    require_once '../app/views/includes/sidebar.php';
?>
<body>
<div class="site-section bg-light">
      <div class="container">
        <div class="row">
        <?php foreach ($res as $car) {
                 foreach ($req as $user) { 
                    if($car['idVoiture'] === $user['idVoiture']) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="item-1">
                <a href="#"><img src=<?php if(isset($car)) echo "uploads/imagesVoiture/" . $car['pht']; ?> alt="Image" class="img-fluid"></a>
                <div class="item-1-contents">
                  <div class="text-center">
                  <h3><a href="#"><?php if(isset($car)) echo $car['marque'] . " " . $car['modele']; ?></a></h3>
                  <div class="rating">
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                    <span class="icon-star text-warning"></span>
                  </div>
                  <div class="rent-price"><span><?php if(isset($car)) echo $car['prixLocation']; ?>&nbsp;DH/</span>jour</div>
                  </div>
                  <ul class="specs">
                    <li>
                      <span>Portes</span>
                      <span class="spec"><?php if(isset($car)) echo $car['nbPortes']; ?></span>
                    </li>
                    <li>
                      <span>Place</span>
                      <span class="spec"><?php if(isset($car)) echo $car['place']; ?></span>
                    </li>
                    <li>
                      <span>Transmission</span>
                      <span class="spec">Automatique</span>
                    </li>
                    <li>
                      <span>Âge minimum</span>
                      <span class="spec">18 ans</span>
                    </li>
                    <li>
                    <?php foreach ($us as $users) {
                            if($user['idUser'] === $users['idUser']) { ?>
                      <span>Louer Par</span>
                      <span class="spec"><?php if(isset($car)) echo $users['nom'] . " " . $users['prenom']; ?></span>
                    </li>
                    <li>
                      <span>CIN</span>
                      <span class="spec"><?php if(isset($car)) echo $users['CIN']; ?></span>
                    </li>
                    <li>
                      <span>Email</span>
                      <span class="spec"><?php if(isset($car)) echo $users['email']; ?></span>
                    </li>
                    <?php } 
                        }
                    ?>
                    <li>
                      <span>De</span>
                      <span class="spec"><?php if(isset($car)) echo $car['date_retrait']; ?></span>
                    </li>
                    <li>
                      <span>à</span>
                      <span class="spec"><?php if(isset($car)) echo $car['date_depot']; ?></span>
                    </li>
                  </ul>
                  <div class="d-flex action">
                    <a href="index.php?controller=eLocation&action=acceuilForm" class="btn btn-warning">Retourner</a>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-12">
            <span class="p-3">1</span>
            <a href="#" class="p-3">2</a>
            <a href="#" class="p-3">3</a>
            <a href="#" class="p-3">4</a>
          </div>
          <?php }
            } 
           } ?>

        </div>
      </div>
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