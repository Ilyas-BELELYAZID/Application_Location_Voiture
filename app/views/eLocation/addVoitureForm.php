<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../app/views/eLocation/css/style.css">
    <title>Ajouter Voiture</title>
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
        <div class="col-6 container p-2">
            <div class="border border-success-subtle">
                <div class="bg-success-subtle text-success p-2">Ajouter une voiture</div>
                <div class="p-3">
                    <form action="index.php?controller=eLocation&action=addVoiture" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="marque">Marque</label>
                            <input type="text" name="marque" placeholder="Entrer la marque" class="form-control" maxlength="100" required>
                        </div><br>
                        <div class="form-group">
                            <label for="modele">Modéle</label>
                            <input type="text" name="modele" placeholder="Entrer le modéle" class="form-control" maxlength="100" required>
                        </div><br>
                        <div class="form-group">
                            <label for="nbVoitures">Nombres de Voitures</label>
                            <input type="number" name="nbVoitures" placeholder="####" class="form-control" step="1" required>
                        </div><br>
                        <div class="form-group">
                            <label for="prixLoc">Prix Location</label>
                            <input type="number" name="prixLoc" placeholder="1234.56" class="form-control" maxlength="10" required>
                        </div><br>
                        <div class="form-group">
                            <label for="nbPortes">Nombre Portes</label>
                            <select name="nbPortes" id="" form-control>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="place">Nombre Places</label>
                            <input type="number" name="place" placeholder="####" class="form-control" step="1" required>
                        </div><br>
                        <div class="form-group">
                            <label for="pht">Photo</label>
                            <input type="file" name="pht" class="form-control" accept="image/*" required>
                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        </div><br>
                        <div class="form-group">
                            <input type="submit" name="add" value="Ajouter" class="btn btn-success form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>