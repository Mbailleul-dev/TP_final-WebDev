<div class="container">
    <div class="row">
        <div class="col-12">
            <fieldset>
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group <?= !isset($formErrors['title']) ?: 'has-danger' ?>">
                            <label for="title" class="form-label <?= isset($formErrors['title']) ? 'is-invalid' : '' ?>">Titre:</label>
                            <input type="text" name="title" class="form-control" placeholder="Dupetitpont" value="<?= @$_POST['title']; ?>">
                            <small class="invalid-feedback"><?= @$formErrors['title'] ?></small>
                        </div>
                        <div class="row">
                        <div class="col-md-12 form-group <?= !isset($formErrors['text']) ?: 'has-danger' ?>">
                            <label for="text" class="form-label">Date de naissance:</label>
                            <input type="text" name="text" class="form-control <?= isset($formErrors['text']) ? 'is-invalid' : '' ?>" value="<?= @$_POST['text']; ?>">
                            <small class="invalid-feedback"><?= @$formErrors['text'] ?></small>
                        </div>
                        </div>
                        
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>