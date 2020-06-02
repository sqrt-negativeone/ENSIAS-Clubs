<div class="modal fade" role="dialog" tabindex="-1" id="eventsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div>
                            <img src="" width="100%" height="400px" style="border-radius:20px;object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div style="width: 100%;">
                            <p class="text-center" style="padding-right: 1erm;padding-left: 1rem;width: 100%;">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row" data-toggle="tooltip" data-bs-tooltip="">
                    <div class="col">
                        <video controls style="margin:1rem 0; width:100%;">
                            <source src="" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <?php
            if ($user_status === "PA") {
            ?>
                <div class="modal-footer">
                    <a class="btn btn-danger btn-icon-split" role="button">
                        <span class="text-white-50 icon"><i class="fas fa-trash"></i></span>
                        <span class="text-white text">Delete</span>
                    </a>
                    <a class="btn btn-warning btn-icon-split" id="mod_btn" role="button" data-toggle="modal" data-target="#modifyEvent" data-dismiss="modal">
                        <span class="text-white-50 icon"><i class="fas fa-sync"></i></span>
                        <span class="text-white text">Modify</span>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>