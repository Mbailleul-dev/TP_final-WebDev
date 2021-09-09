<?php
session_start();

require_once "../models/database.php";
require_once "../pages/config.php";
require_once "../models/userModel.php";
require_once "../controllers/profilController.php";
if ($_SESSION['login']) {
    setcookie('login', $_SESSION['login'], time() + 365 * 24 * 3600, null, null, false, true);
}
require_once "../header2.php";

?>


<div class="container profil">
    <div class="row">
        <div class="col-2 offset-2">
            <img id="profilImg" src="<?php
                                        if (!empty($_SESSION['avatar'])) {
                                            echo $_SESSION['avatar'];
                                        } else { ?>../assets/img/defaultProfil.svg <?php } ?>" alt="photo de profil">
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
                    <button type="button" class="btn btn-search btn-size" data-bs-toggle="modal" data-bs-target="#updateModal"><a href="#">Modifier mon profil</a></button>
                    <?php require_once "updateProfil.php"; ?>
                    <?php if ($_SESSION['id_userTypes'] == 2) { ?>
                        <button type="button" class="btn btn-search btn-size" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer mon compte</button>
                    <?php require_once "deleteProfil.php";
                    } elseif ($_SESSION['id_userTypes'] == 1) { ?>
                        <button type="button" class="btn btn-search btn-size" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Supprimer un compte</button>
                        <?php require_once "deleteOtherUser.php"; } ?>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-search btn-size"><a href="sendMail.php">Réinitialiser le mdp</a></button>
                    <button type="button" class="btn btn-search btn-size"><a href="deconnexion.php">Deconnexion</a></button>
                </div>
            </div>
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