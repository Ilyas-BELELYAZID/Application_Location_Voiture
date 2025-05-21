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
<?php 
    if (!empty($error)) { 
  ?>
    <div class="container-fluid site-section bg-light">
    <div class="row">
    <div class="col-3"></div>
        <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="exclamation-triangle-fill" viewBox="0 0 12 12">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
            </svg>
            <h4 class="alert-heading">Oooops!</h4>
            <p class="mb-0" style="margin-left: 5%;"><?php echo $error; ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
  </div>
    <?php
            unset($error); 
        } 
    ?>
    <?php 
        if (!empty($success)) { 
    ?>
    <div class="container-fluid site-section bg-light">
    <div class="row">
    <div class="col-3"></div>
        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                <symbol id="check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>
            <h4 class="alert-heading">Félicitations!</h4>
            <p class="mb-0" style="margin-left: 5%;"><?php echo $success; ?></p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    </div>
  </div>
    <?php
            unset($success); 
        } 
    ?>
      <div class="container">
        <div class="row">
        <?php foreach ($req as $user) {
                 foreach ($res as $car) {
                    foreach ($us as $users) { 
                        if(($car['idVoiture'] === $user['idVoiture']) && ($users['idUser'] === $user['idUser']) && ($user['louer']) != "0") { ?>
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
                      <span>Louer Par</span>
                      <span class="spec"><?php if(isset($users)) echo $users['nom'] . " " . $users['prenom']; ?></span>
                    </li>
                    <li>
                      <span>CIN</span>
                      <span class="spec"><?php if(isset($users)) echo $users['CIN']; ?></span>
                    </li>
                    <li>
                      <span>Email</span>
                      <span class="spec"><?php if(isset($users)) echo $users['email']; ?></span>
                    </li>
                    <li>
                      <span>De</span>
                      <span class="spec"><?php if(isset($user)) echo $user['date_retrait']; ?></span>
                    </li>
                    <li>
                      <span>à</span>
                      <span class="spec"><?php if(isset($user)) echo $user['date_depot']; ?></span>
                    </li>
                  </ul>
                  <?php 
                    if(session_status() === PHP_SESSION_NONE) session_start(); 
                    if(isset($_SESSION['loginSuccess'])){
                        $_SESSION['idUser'] = $users['idUser'];
                        $_SESSION['idVoiture'] = $car['idVoiture'];
                    }
                  ?>
                  <div class="d-flex action">
                    <a href="index.php?controller=eLocation&action=deleteRent" class="btn btn-warning" onclick="return confirm('Voulez-vous retourner cette voiture?');">Retourner</a>
                  </div>
                </div>
              </div>
          </div>
          <?php }
            }
            } 
           } ?>
        <div class="col-12">
            <span class="p-3">1</span>
            <a href="#" class="p-3">2</a>
            <a href="#" class="p-3">3</a>
            <a href="#" class="p-3">4</a>
          </div>
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