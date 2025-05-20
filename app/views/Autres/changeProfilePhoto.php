<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../app/views/Autres/css/style.css">
    <title>Changer ma photo</title>
</head>
<body>
<?php 
    require_once '../app/views/includes/sidebar.php';
?>
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
        <div class="col-8 container p-5">
            <div class="border border-primary-subtle">
                <div class="bg-primary-subtle text-primary p-2"><b><big>Changer ma photo</big></b></div>
                <div class="p-3"><br>
                    <form action="index.php?controller=autres&action=profilePhoto" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pht">Photo d'identitié (max. 3 Mo) (<b class="text-danger">*</b>):</label>
                            <input type="file" name="pht" class="form-control" accept="image/*" required>
                            <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        </div><br>
                        <div class="list-group-horizantaly">
                            <input type="submit" name="changePht" value="Envoyer" class="btn btn-primary list-element">
                            <input type="reset" value="Annuler" class="btn btn-secondary list-element">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>