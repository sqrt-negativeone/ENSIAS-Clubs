<section class="clean-block clean-info dark">
    <div class="container">
        <div class="block-heading">
            <h2 class="text-info">Les clubs de notre établissement</h2>
            <p>L'ENSIAS vous offre un large éventail de clubs afin de satisfaire tous les go&ucirc;ts.</p>
        </div>
        <?php
        foreach ($clubs as $club) {
            if ($club['photo']===null && $club['texte_desc']===null) continue;
            $cover="data:image/*;base64,".base64_encode($club['photo']);
            $club_name = $club['nom_club'];
            $club_acro = $club['acro_club'];
            $discreption =$club['texte_desc'];
            $id=$club['id_club'];
            $photo=$club['photo'];
            $href = "/pages/clubs.php?target=".$club_acro."&i=".$id;
        ?>
            <div class="row align-items-center" style="margin: 3rem 0;">
                <div class="col-md-6"><img class="img-thumbnail" src=<?php echo $cover ?>></div>
                <div class="col-md-6">
                    <h3><?php echo htmlspecialchars(strtoupper($club_name)) ?></h3>
                    <div class="getting-started-info">
                        <p><?php echo htmlspecialchars($discreption) ?></p>
                    </div>
                    <a class="btn btn-outline-primary btn-lg" role="button" href=<?php echo htmlspecialchars($href) ?>>Savoir plus!</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>