<div class="modal fade" role="dialog" tabindex="-1" id="quitCell">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Quitter la cellule </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 50%;">
                <p>Êtes-vous sûr de vouloir quitter la cellule ?</p>
                <form method="post" action="functions/leave_cell.php">
                    <input type="hidden" name="id_cellule" value="<?php echo $_GET['i']; ?>">
                    <input type="hidden" name="statut" value="<?php echo $cellule_status; ?>">
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">Non</button>
                        <button class="btn btn-primary" name="quit_cell" type="submit">Oui</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>