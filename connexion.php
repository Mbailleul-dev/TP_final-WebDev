
<?php
require_once "header.php";
?>

<div class="container text-center">
    <div class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <fieldset>
                <legend><u>Connexion</u></legend>
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['Pseudo']) ?: 'has-danger' ?>">
                            <label for="Pseudo" class="form-label">Nom d'utilisateur <span class="text-danger">*:</span></label>
                            <input type="text" name="Pseudo" id="Pseudo" placeholder="ex: Pseudo123" class="form-control <?= isset($formErrors['Pseudo']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['Pseudo'] ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group <?= !isset($formErrors['password']) ?: 'has-danger' ?>">
                            <label for="password" class="form-label">Mot de passe <span class="text-danger">*:</span></label>
                            <input type="password" name="password" id="password" placeholder="ex: mDp\132" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : '' ?>" />
                            <small class="invalid-feedback"><?= @$formErrors['password'] ?></small>
                        </div>
                    </div>
                    
                    <div class="row text-center mt-2">
                        <div class="col">
                            <u><a href="#" class="link">Mot de passe oublié ?</a></u>
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


<?php require_once "footer.php"; ?>