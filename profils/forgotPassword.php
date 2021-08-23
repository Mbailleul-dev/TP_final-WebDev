<?php
session_start();

require_once "../pages/config.php";
require_once "../models/database.php";
require_once "../models/userModel.php";
require_once "../controllers/forgotPasswordController.php";

require_once "../header.php";
require_once "../navbar.php";
?>

<div class="container text-center">
    <div class="row mt-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <legend><u>Réinitialiser le mot de passe</u></legend>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['login']) ?: 'has-danger' ?>">
                            <label for="login" class="form-label">Nom d'utilisateur <span class="text-danger">*:</span></label>
                            <input type="text" name="login" id="login" placeholder="ex: pseudo123" class="form-control <?= isset($formErrors['login']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['login'] ?></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['mail']) ?: 'has-danger' ?>">
                            <label for="mail" class="form-label">Adresse e-mail <span class="text-danger">*:</span></label>
                            <input type="email" name="mail" id="mail" placeholder="ex: nom.prenom@gmail.com" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['mail'] ?></small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group">
                            <input type="submit" name="forgotPassword" value="Envoyer" class="btn btn-search" />
                            <button class="btn btn-search" type="text"><a href="connexion.php"> Retour </a></button>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div><?= @$formErrors['invalidMDP'] ?></div>
            <div><?= @$formErrors['mailExist'] ?></div>
        </div>
    </div>
</div>

<?php
require_once "../footer.php";
?>