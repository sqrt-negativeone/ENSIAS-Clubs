$(document).ready(function(){            
            $('#search_resp').keyup(function() {
                
                $.ajax({
                    type : 'POST',
                    url : 'functions/new_resp.php',
                    dataType: "json",
                    data : {
                        search : $(this).val(),
                    },
                    success : function(data) {
                        // var prsident= <?php echo json_encode($_SESSION['name']) ?>;
                        var s='';
                    for(var i=0;i<data.length;i++){
                        var id="responsableCheck-1"+i;
                        var photo="data:image/jpeg;base64,"+data[i].photo;
                        if (data[i].photo=='') {
                             photo='../img/profile.png';
                        }
                        //s=s+'<h1>'+data[i].nom+' '+'<img src="data:image/jpeg;base64,'+data[i].photo+'"/>'+'</p>';
                        s=s+'<li class="list-group-item"><div class="card"><div class="card-body"><div class="row align-items-center no-gutters"><div class="col-auto"><img style="width: 50px; height: 50px;" class="border rounded-circle img-profile" src='+photo+'></div><div class="col mr-2" style="margin-left: 10px;"><span style="font-size: 120%;">'+data[i].nom.toUpperCase()+" "+data[i].prenom.toLowerCase()+'</span></div><div class="col-auto align-self-center"><div class="custom-control custom-checkbox"><input class="custom-control-input" value="'+data[i].cne+'" type="checkbox" id="'+id+'" name="new_resp[]"><label class="custom-control-label" for='+id+'></label></div></div></div></div></div></li>';
                    }
                    
                                $("#result").html(s);
                                
                              
                    }   
                
            });
        })
});
