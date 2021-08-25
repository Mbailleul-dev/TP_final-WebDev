<div class="container">
    <div class="row">
        <fieldset>
            <form action="#" method="POST">
                <div class="row">
                    <div class="form-group">
                        <label for="title">Titre:</label>
                        <input type="text" class="form-control" name="title" value ="<?= @$_POST['title']; ?>" id="title">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="text">Texte:</label>
                        <textarea class="form-control" name="text" value ="<?= @$_POST['text']; ?>"id="text" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-search">Envoyer le nouvel article</button>
            </form>
        </fieldset>
        <small><?= $error ?></small>
    </div>
</div>