<div class="modal fade" role="dialog" tabindex="-1" id="joinClub">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choisir la (les) cellules à rejoindre  </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 50%;">
                
                <form method="post" action="functions/join_club_cells.php">
                    <ul class="list-group" id="result">
                      
                    </ul>
                    <div class="modal-footer">
                        <button class="btn btn-dark" type="button" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary" name="submit_join" type="submit">Valider</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
