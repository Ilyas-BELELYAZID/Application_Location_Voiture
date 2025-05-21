<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- MDB Bootstrap Bundle JS (optionnel si tu utilises MDB) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <link rel="stylesheet" href="../app/views/includes/css/styles.css">
    <title></title>
</head>
<body>
    <header>
        <nav class="navbar sticky-top" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <!-- Bouton Navbar Toggler (Menu Offcanvas) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Menu Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Location Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav navbar-expand-lg justify-content-start flex-grow-1 pe-1">
                            <hr>
                            <li class="nav-item me-3 me-lg-3">
                                <a class="nav-link active" aria-current="page" href="index.php?controller=eLocation&action=acceuilForm">
                                 <i class="fas fa-house-user fa-lg"></i>  Accueil
                                </a>
                            </li>
                            <?php  
                                if(session_status() === PHP_SESSION_NONE) session_start();
                                if(isset($_SESSION['loginSuccess']) && ($_SESSION['role'] === "admin")) { 
                            ?>
                            <hr>
                                <h6>Services en ligne</h6>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?controller=eLocation&action=addVoitureForm">
                                        <i class="fas fa-car fa-lg"></i>  Ajouter une voiture
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?controller=eLocation&action=deleteForm">
                                        <i class="fas fa-rectangle-xmark fa-lg"></i>  Supprimer une voiture
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?controller=eLocation&action=updateVoitureForm">
                                        <i class="fas fa-address-card fa-lg"></i>  Modifier une voiture
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?controller=eLocation&action=deleteRentForm">
                                        <i class="fas fa-circle-check fa-lg"></i>  Retourner une voiture
                                    </a>
                                </li>
                                <?php } ?>
                            <hr>
                            <h6>Autres</h6>
                            <!-- Default dropend button -->
                            <li class="nav-item dropend me-3 me-lg-3">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user fa-lg"></i>  Profile
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
                        <hr>
                        <h6>Recherche par mot clé</h6>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>

                <nav class="navbar navbar-expand-lg sticky-top">
                    <div class="container-fluid">
                        <!-- Icônes et Options Droites -->
                        <ul class="navbar-nav d-flex flex-row me-2">
                            <li class="nav-item me-3 me-lg-3">

                            </li>
                            <li class="nav-item me-3 me-lg-3">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-1" size="34" type="search" placeholder="Recherche par marque ou par modèle" aria-label="Search"/>
                                    <button class="btn btn-outline-primary" type="submit">Recherche</button>
                                </form>
                            </li>
                            <li class="nav-item me-3 me-lg-3">
                                <button class="nav-link text-dark position-relative" type="button" title="Consulter vos messages" id="liveToastBtn" href="#"><i class="fa-solid fa-envelope fa-lg"></i> 
                                    Messages
                                    <?php  
                                        if(session_status() === PHP_SESSION_NONE) session_start();
                                        if(isset($_SESSION['loginSuccess']) && isset($_SESSION['error'])) { 
                                    ?>
                                        <span class="position-absolute top-0 start-0 p-2 bg-danger border border-light rounded-circle"></span>
                                    <?php } ?>
                                </button>
                                <?php  
                                    if(session_status() === PHP_SESSION_NONE) session_start();
                                    if(isset($_SESSION['loginSuccess']) && isset($_SESSION['error'])) { 
                                ?>
                                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                        <i class="fas fa-bell fa-mx"></i>&nbsp;&nbsp;
                                            <strong class="me-auto">eLocation</strong>
                                            <!-- <small>11 mins ago</small> -->
                                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                        Bonjour Monsieur,
                                        Nous espérons que vous pourrez retourner le véhicule dans les plus brefs délais, car le temps imparti est désormais écoulé.
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <!-- Script pour activer le Toast -->
                                <script>
                                    document.getElementById('liveToastBtn').addEventListener('click', function () {
                                        const toastEl = document.getElementById('liveToast');
                                        const toast = new bootstrap.Toast(toastEl);
                                        toast.show();
                                    });
                                </script>
                            </li>
                            <li class="nav-item dropdown me-3 me-lg-3">
                                <a class="nav-link dropdown-toggle text-dark" title="Consulter votre profile" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user mx-1"></i> Profile 
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
</body>
</html>