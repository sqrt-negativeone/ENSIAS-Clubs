<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-white" style="background-color: black;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <?php
          echo $_SESSION['context'];
          ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="color: white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo $_SESSION['msg'];
        ?>
      </div>
    </div>
  </div>
</div>