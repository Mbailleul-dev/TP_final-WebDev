<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" method="POST">
            <div class="modal-content">
                <div class="modal-body">
                    Êtes-vous certain ?
                    <label for="deleteProfil"></label>
                    <input type="text" class="invisible" id="deleteProfil" name="deleteProfil" value="<?= $_SESSION['login'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse" data-bs-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-search">Supprimer définitivement</button>
                </div>
            </div>
        </form>
    </div>
</div>