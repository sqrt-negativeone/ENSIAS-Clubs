$(document).ready(()=>{
    $(".btn-join").click(function(){
        var btn = $(this);
        // t=btn.attr("data-type");
        dist=btn.attr("data-dist")
        $.post('functions/join_club_cells.php',{id_club:dist},

        function (data){
            $('#joinClub').modal('show'); 
        });
        
    });
});

