<?php
session_start();
 
require_once "../models/database.php";
require_once "../pages/config.php";
require_once "../models/userModel.php";
require_once "../controllers/connexionController.php";

require_once "../header.php";
require_once "../navbar.php";
?>


<div class="container text-center">
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <legend><u>Connexion</u></legend>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['login']) ?: 'has-danger' ?>">
                            <label for="login" class="form-label">Nom d'utilisateur <span class="text-danger">*:</span></label>
                            <input type="text" name="login" id="login" value="<?= @$_POST['login'] ?>" placeholder="ex: login123" class="form-control <?= isset($formErrors['login']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['login'] ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['password']) ?: 'has-danger' ?>">
                            <label for="password" class="form-label">Mot de passe <span class="text-danger">*:</span></label>
                            <input type="password" name="password" id="password" value="<?= @$_POST['password'] ?> placeholder="ex: mDp\132" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['password'] ?></small>
                        </div>
                    </div>
                    
                    <div class="row text-center mt-2">
                        <div class="col">
                            <u><a href="forgotPassword.php" class="link">Mot de passe oublié ?</a></u>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group">
                            <input type="submit" name="connexion" value="Connexion" class="btn btn-search" /><button class="btn btn-search" type="text"><a href="inscription.php">S'inscrire</a></button>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>


<?php require_once "../footer.php"; ?>