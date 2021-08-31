<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-body">
          <label for="updateLogin">Nouveau pseudo:</label>
          <input type="text" id="updateLogin" class="form-control" name="updateLogin" value="<?= @$_SESSION['login'] ?>">
          <label for="updateLogin">Changer mon adresse mail:</label>
          <input type="email" id="updateMail" name="updateMail" class="form-control" value="<?= @$_SESSION['mail'] ?>">
          <label for="avatar">Changer mon avatar:</label>
          <input type="file" id="avatar" name="avatar" class="form-control" placeholder="choisir un fichier">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-search">Enregistrer</button>
        </div>
      </div>
    </form>
  </div>
</div>