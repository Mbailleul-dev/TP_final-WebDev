<div class="container">
    <div class="row">
        <fieldset>
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="author">Auteur:</label>
                            <input type="text" class="form-control" name="author" value="<?= @$_POST['author']; ?>" id="author">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Titre:</label>
                            <input type="text" class="form-control" name="title" value="<?= @$_POST['title']; ?>" id="title">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="release">Date de parution:</label>
                            <input type="number" class="form-control" name="release" value="<?= @$_POST['release']; ?>" id="release">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="resume">Résumé:</label>
                        <textarea class="form-control" name="resume" value="<?= @$_POST['resume']; ?>" id="resume" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-search">Ajouter ce livre</button>
            </form>
        </fieldset>
        <small><?= $error ?></small>
    </div>
</div>