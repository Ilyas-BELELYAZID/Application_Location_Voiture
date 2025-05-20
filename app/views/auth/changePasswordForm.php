<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../app/views/auth/css/style.css">
    <title>Changer mot de passe</title>
</head>
<body>
<?php 
    require_once '../app/views/includes/sidebar.php';
?>
<?php 
    if (!empty($error)) { 
?>
<div class="row container">
<div class="col-4"></div>
    <div class="col-2 alert alert-danger alert-dismissible fade show w-50" role="alert">
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
<div class="row container">
<div class="col-4"></div>
    <div class="col-2 alert alert-success alert-dismissible fade show w-50" role="alert">
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
<div class="row">
    <div class="col-9 container pt-3">
        <div class="border border-primary-subtle">
            <div class="bg-primary-subtle text-primary p-2"><b><big>Changer du mot de passe</big></b></div>
            <div class="p-3 needs-validation" novalidate><br>
                <span class="badge text-bg-success">Règles du mot de passe:</span>
                <p>- Le nombre de caractères du mot de passe doit être entre 8 et 40. <br>- Le mot de passe doit contenir au moins un chiffre. <br>- Le mot de passe doit contenir au moins un caractère majuscule.</p>
                <form action="index.php?controller=auth&action=updatePassword" method="POST" class="needs-validation" id="passwordForm" novalidate>
                    <div class="form-group mb-3">
                        <label for="oldPass" class="form-label">Ancien mot de passe</label>
                        <input type="password" name="oldPass" id="oldPass" placeholder="Entrer l'ancien mot de passe" class="form-control" minlength="8" required>
                        <div class="invalid-feedback">
                            Veuillez entrer votre ancien mot de passe.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="newPass1" class="form-label">Nouveau mot de passe</label>
                        <input type="password" name="newPass1" id="newPass1" placeholder="Entrer un nouveau mot de passe" class="form-control" minlength="8" required>
                        <small class="text-danger d-none" id="passError">
                            Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.
                        </small>
                    </div>

                    <div class="form-group mb-3">
                        <label for="newPass2" class="form-label">Confirmer nouveau mot de passe</label>
                        <input type="password" name="newPass2" id="newPass2" placeholder="Confirmer le nouveau mot de passe" class="form-control" minlength="8" required>
                        <small class="text-danger d-none" id="confirmError">
                            Les mots de passe ne correspondent pas.
                        </small>
                    </div>

                    <div class="list-group-horizantaly">
                        <input type="submit" name="change" value="Changer mot de passe" class="btn btn-primary list-element" id="submitBtn" disabled>
                        <input type="reset" value="Annuler" class="btn btn-secondary list-element">
                    </div>
                </form>
            </div>

            <!-- Validation Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const form = document.getElementById('passwordForm');
                    const newPass1 = document.getElementById('newPass1');
                    const newPass2 = document.getElementById('newPass2');
                    const submitBtn = document.getElementById('submitBtn');
                    const passError = document.getElementById('passError');
                    const confirmError = document.getElementById('confirmError');
                    
                    const validateForm = () => {
                        let valid = true;
                        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,40}$/;

                        if (!passwordRegex.test(newPass1.value)) {
                            newPass1.classList.add('is-invalid');
                            passError.classList.remove('d-none');
                            valid = false;
                        } else {
                            newPass1.classList.remove('is-invalid');
                            newPass1.classList.add('is-valid');
                            passError.classList.add('d-none');
                        }

                        if (newPass1.value !== newPass2.value) {
                            newPass2.classList.add('is-invalid');
                            confirmError.classList.remove('d-none');
                            valid = false;
                        } else {
                            newPass2.classList.remove('is-invalid');
                            newPass2.classList.add('is-valid');
                            confirmError.classList.add('d-none');
                        }

                        submitBtn.disabled = !valid;
                    };

                    newPass1.addEventListener('input', validateForm);
                    newPass2.addEventListener('input', validateForm);

                    form.addEventListener('submit', (event) => {
                        if (submitBtn.disabled) {
                            event.preventDefault();
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
</body>
</html>