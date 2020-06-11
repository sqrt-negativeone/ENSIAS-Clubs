$(document).ready(()=>{
    $(".btn-join").click(function(){
        // var btn = $(this);
        // // t=btn.attr("data-type");
        // dist=btn.val();
        // alert(dist);
        // $.post('functions/join_club_cells.php',{id_club:dist},

        // function (data){
        // 	alert(data.length);
        //     $('#joinClub').modal('show'); 
        // });

        $.ajax({
            type : 'POST',
            url : 'functions/join_club_cells.php',
            dataType: "json",
            data : {
                id_club : $(this).val(),
            },
            success : function(data) {
                var s='';
            for(var i=0;i<data.length;i++){
                var id="responsableCheck-1"+i;
                var photo="data:image/jpeg;base64,"+data[i].photo;
                if (data[i].photo=='') {
                     photo='../img/profile.png';
                }
                //s=s+'<h1>'+data[i].nom+' '+'<img src="data:image/jpeg;base64,'+data[i].photo+'"/>'+'</p>';
                s=s+'<li class="list-group-item"><div class="card"><div class="card-body"><div class="row align-items-center no-gutters"><div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;">'+data[i].intitule+'</span></div><div class="col-auto align-self-center"><div class="custom-control custom-checkbox"><input class="custom-control-input" value="'+data[i].id_cellule+'" type="checkbox" id="'+id+'" name="join_club_cells[]"><label class="custom-control-label" for='+id+'></label></div></div></div></div></div></li>';
            }
            
                        $("#result").html(s);
                        
                      $("#joinClub").modal('show');
            }   
        
         });
        
    });
});

