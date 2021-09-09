<!-- Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" method="POST">
            <div class="modal-content text-center">
                <div class="modal-header">
                    Quel utilisateur voulez-vous supprimer ?
                </div>
                <div class="modal-body">
                    <label for="login1">Entrer le pseudo:</label>
                    <input type="text" class="form-control" id="login1" name="login1" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                    <label for="login2">Confirmer le pseudo:</label>
                    <input type="text" class="form-control" id="login2" name="login2" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off>
                    <small class="invalid-feedback"><?= $error ?></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-search">Supprimer définitivement</button>
                </div>
            </div>
        </form>
    </div>
</div>
