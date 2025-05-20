<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../app/views/Autres/css/styles.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Profile</title>
</head>
<?php 
    require_once '../app/views/includes/sidebar.php';
?>
<body>
    <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img class="rounded-circle img-fluid" src=<?php if(!empty($pht)) {echo "uploads/imagesProfile/" . $pht;} else{echo "uploads/imagesProfile/user";} ?> alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php 
                                        if (!empty($nom) && !empty($prenom)) { 
                                    ?>
                                        <?php echo $nom . " " . $prenom; ?>
                                    <?php 
                                        } 
                                    ?>
                                    </h5>
                                    <h6>
                                    <?php 
                                        if (!empty($role)) { 
                                    ?>
                                        <?php echo $role; ?>
                                    <?php 
                                        } 
                                    ?>
                                    </h6>
                                    <p class="proile-rating">LOUER : <span class="badge text-bg-secondary">10</span> fois</p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Mes informations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="index.php?controller=autres&action=updateProfileForm" class="btn btn-outline-secondary" style="border-radius: 100px;">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                if (!empty($nom)) { 
                                            ?>
                                                <p><?php echo $nom; ?></p>
                                            <?php 
                                                } 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Prénom</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                if (!empty($prenom)) { 
                                            ?>
                                                <p><?php echo $prenom; ?></p>
                                            <?php 
                                                } 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                if (!empty($email)) { 
                                            ?>
                                                <p><?php echo $email; ?></p>
                                            <?php 
                                                } 
                                            ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CIN</label>
                                            </div>
                                            <div class="col-md-6">
                                            <?php 
                                                if (!empty($cin)) { 
                                            ?>
                                                <p><?php echo $cin; ?></p>
                                            <?php 
                                                } 
                                            ?>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>
</html>