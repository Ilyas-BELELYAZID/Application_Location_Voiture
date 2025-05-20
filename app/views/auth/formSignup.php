<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup eLocation</title>
        <link rel="stylesheet" href="static/css/bootstrap.min.css">
        <script src="static/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="../app/views/auth/css/styles.css">
        <link rel="icon" href="" type="image/png">
    </head>
    <body>
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
        <div class="row container" id="abc">
            <div class="col position-relative" id="abcde">
                <div class="position-absolute bottom-0 start-0">
                    <h1 style="color: navy;"><b>Welcome!</b></h1>
                </div>
            </div>
            <div class="col" id="abcd" class="needs-validation" novalidate>
                <h1 style="text-align: center; color: darkblue;"><b>Sign Up</b></h1>
                <form action="index.php?controller=auth&action=creatAccount" method="POST" class="needs-validation" novalidate id="passwordForm">
                <div class="form-group">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Ilyas" required maxlength="20" class="form-control">
                    <small class="text-danger d-none" id="prenomError">
                        Le prénom doit contenir seulement des alphabets et des espaces.
                    </small>
                </div>
                <div class="form-group">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="BEL EL YAZID" required maxlength="20" class="form-control">
                    <small class="text-danger d-none" id="nomError">
                        Le nom doit contenir seulement des alphabets et des espaces.
                    </small>
                </div>
                <div class="form-group">
                    <label for="CIN" class="form-label">CIN</label>
                    <input type="text" name="CIN" id="CIN" placeholder="RB12345" required class="form-control">
                    <small class="text-danger d-none" id="CINError">
                        La CIN doit contenir au moins un alphabet et des chiffres.
                    </small>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Adresse Email</label>
                    <input type="email" name="email" id="email" placeholder="hello@reeallygreatsite.com" required class="form-control">
                    <small class="text-danger d-none" id="emailError">
                        L'email adresse doit contenir au moins les caractères @ et .
                    </small>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="password" placeholder="***********" required minlength="8" class="form-control">
                            <small class="text-danger d-none" id="passError">
                                Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="confirm" class="form-label">Confirmer mot de passe</label>
                            <input type="password" name="confirm" id="confirm" placeholder="***********" required minlength="8" class="form-control">
                            <small class="text-danger d-none" id="confirmError">
                                Les mots de passe ne correspondent pas.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2" class="form-label">
                            Accepter les termes et conditions
                        </label>
                    </div>
                </div><br>
                <input type="submit" value="Créer un compte" class="form-control btn btn-primary" id="submitBtn" disabled>
              </form>
              <h5 style="text-align: center;">or</h5>
              <a class=" btn form-control btn-center btn-outline-secondary" href="index.php" type="button" style="border-radius: 20px;">Se connecter</a>
            </div>
        </div>

        <!-- Validation Script -->
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const form = document.getElementById('passwordForm');
                    const newPass1 = document.getElementById('password');
                    const newPass2 = document.getElementById('confirm');
                    const submitBtn = document.getElementById('submitBtn');
                    const passError = document.getElementById('passError');
                    const confirmError = document.getElementById('confirmError');
                    const emailError = document.getElementById('emailError');
                    const email = document.getElementById('email');
                    const cin = document.getElementById('CIN');
                    const cinError = document.getElementById('CINError');
                    const nom = document.getElementById('nom');
                    const nomError = document.getElementById('nomError');
                    const prenom = document.getElementById('prenom');
                    const prenomError = document.getElementById('prenomError');
                    
                    const validateForm = () => {
                        let valid = true;
                        const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,40}$/;
                        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,100}$/;
                        const cinRegex = /^[a-zA-Z]{1,2}\d+$/;
                        const nometprenomRegex = /^[a-zA-Z\s]+$/;

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

                        if (!emailRegex.test(email.value)) {
                            email.classList.add('is-invalid');
                            emailError.classList.remove('d-none');
                            valid = false;
                        } else {
                            email.classList.remove('is-invalid');
                            email.classList.add('is-valid');
                            emailError.classList.add('d-none');
                        }

                        if(!cinRegex.test(cin.value)){
                            cin.classList.add('is-invalid');
                            cinError.classList.remove('d-none');
                            valid = false;
                        }
                        else{
                            cin.classList.remove('is-invalid');
                            cin.classList.add('is-valid');
                            cinError.classList.add('d-none');
                        }

                        if(!nometprenomRegex.test(nom.value)){
                            nom.classList.add('is-invalid');
                            nomError.classList.remove('d-none');
                            valid = false;
                        }
                        else{
                            nom.classList.remove('is-invalid');
                            nom.classList.add('is-valid');
                            nomError.classList.add('d-none');
                        }

                        if(!nometprenomRegex.test(prenom.value)){
                            prenom.classList.add('is-invalid');
                            prenomError.classList.remove('d-none');
                            valid = false;
                        }
                        else{
                            prenom.classList.remove('is-invalid');
                            prenom.classList.add('is-valid');
                            prenomError.classList.add('d-none');
                        }

                        submitBtn.disabled = !valid;
                    };

                    newPass1.addEventListener('input', validateForm);
                    newPass2.addEventListener('input', validateForm);
                    email.addEventListener('input', validateForm);
                    cin.addEventListener('input', validateForm);
                    nom.addEventListener('input', validateForm);
                    prenom.addEventListener('input', validateForm);

                    form.addEventListener('submit', (event) => {
                        if (submitBtn.disabled) {
                            event.preventDefault();
                        }
                    });
                });
            </script>
    </body>
</html>