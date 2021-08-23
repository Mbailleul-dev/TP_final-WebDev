<?php
session_start();


require_once "../models/database.php";
require_once "../pages/config.php";
require_once "../models/userModel.php";
require_once "../controllers/profilController.php";
if ($_SESSION['login']) {
    setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600, null, null, false, true);
}
require_once "../header.php";
require_once "../navbar.php";
?>


<div class="container">
    <div class="row mt-4">
        <div class="col-2 offset-2">
            <img id="profilImg" src="<?php
            if (!empty($_SESSION['avatar'])){ echo '../assets/img/userMedias/'.$_SESSION['avatar']; }
            else { ?>../assets/img/defaultProfil.svg <?php } ?>" alt="photo de profil">
        </div>
        <div class="col">
            <h4 class="">Bonjour <?= @$_SESSION['login'] ?> !</h4>
            <div class="row mt-2">
                <div class="col-md-6">
                    <p>Nom d'utilisateur: <?= @$_SESSION['login'] ?></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <p>Adresse mail: <?= @$_SESSION['mail'] ?></p>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <form action="profil.php" method="POST" enctype="multipart/form-data">
                        <label for="avatar">Changer mon avatar:</label>
                        <input type="file" id="avatar" name="file" class="form-control" placeholder="choisir un fichier">
                        <button type="submit" class="btn btn-search">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">

            <button type="submit" class="btn btn-search"><a href="sendMail.php">Réinitialiser le mdp</a></button>
            <button type="button" class="btn btn-search"><a href="deconnexion.php">Deconnexion</a></button>
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
require_once "../footer.php"
?>