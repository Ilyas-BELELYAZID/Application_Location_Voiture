<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login eLocation</title>
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
                    <h1 style="color: navy;"><b>Welcome Back!</b></h1>
                </div>
            </div>
            <div class="col" id="abcd">
                <h1 style="text-align: center; color: darkblue;"><b>Log In</b></h1>
                <form action="index.php?controller=auth&action=authenticate" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" style="font-size: 1.25em;" placeholder="hello@reeallygreatsite.com" required class="form-control">
                </div><br>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" style="font-size: 1.25em;" placeholder="***********" required minlength="8" class="form-control">
                </div>
                <div class="form-group position-relative">
                    <input type="checkbox" name="checkbox">
                    <label for="checkbox">Se rappeler de moi</label>
                    <a href="" class="position-absolute bottom-0 end-0">Mot de passe oublié?</a>
                </div><br>
                <input type="submit" value="Se connecter" class="form-control">
              </form>
              <h5 style="text-align: center;">or</h5>
              <a class=" btn form-control btn-center btn-outline-secondary" type="button" href="index.php?controller=auth&action=signUp" style="border-radius: 20px;">S'inscrire</a>
            </div>
        </div>
    </body>
</html>