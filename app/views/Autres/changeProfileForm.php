<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../app/views/Autres/css/styleProfile.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Modifier Profile</title>
</head>
<?php 
    require_once '../app/views/includes/sidebar.php';
?>
<body>
    <div class="row mt-4">
        <?php 
            if (!empty($error)) { 
        ?>
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
        <?php
                unset($error); 
            } 
        ?>
        <?php 
            if (!empty($success)) { 
        ?>
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
        <?php
                unset($success); 
            } 
        ?>
    </div>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row mt-4">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src=<?php if(!empty($pht)) {echo "uploads/imagesProfile/" . $pht;} else{echo "uploads/imagesProfile/user";} ?>><span class="font-weight-bold"><?php if(!empty($nom) && !empty($prenom)) echo $nom . " " . $prenom; ?></span><span class="text-black-50"><?php if(!empty($email)) echo $email; ?></span><span> </span></div>
            </div>
            <div class="col-md-7 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Paramétres</h4>
                    </div>
                    <form action="index.php?controller=autres&action=updateProfile" method="POST">
                        <div class="row mt-2">
                            <div class="col-md-6"><label for="nom" class="labels">Nom</label><input type="text" name="nom" class="form-control" value=<?php if(!empty($nom)) {echo $nom;} ?> placeholder="Entrer le nom" required></div>
                            <div class="col-md-6"><label for="prenom" class="labels">Prénom</label><input type="text" name="prenom" class="form-control" value=<?php if(!empty($prenom)) {echo $prenom;} ?> placeholder="Entrer le prénom" required></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label for="CIN" class="labels">CIN</label><input type="text" name="CIN" class="form-control" placeholder="RB12345" value=<?php if(!empty($cin)) {echo $cin;} ?> required></div>
                            <div class="col-md-12 mt-2"><label for="email" class="labels">Address Email</label><input type="text" name="email" class="form-control" placeholder="Enter addresse e-mail" value=<?php if(!empty($email)) {echo $email;} ?> required></div>
                        <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" name="updateProfile" value="Enregistrer Profile"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>