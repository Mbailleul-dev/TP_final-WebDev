<div class="container">
  <div class="row">
    <fieldset>
      <form action="#" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="bookFormControlSelect">Modifier un book:</label>
              <select name="bookFormControlSelect" class="form-control" id="bookFormControlSelect">
                <?php
                foreach ($booksList as $book) { ?>
                  <option value="<?= $book->id ?>"><?= $book->title ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-search">Choisir ce livre</button>
          </div>
        </div>
      </form>
    </fieldset>
  </div>
</div>

