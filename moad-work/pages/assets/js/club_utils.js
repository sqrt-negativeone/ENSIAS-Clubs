function search() {
    var search_in = $("#search-in");
    var search_output = $("#search-out");
    var data = search_in.val();
    $.post('../functions/search_pres.php', {
        data: data,
    },
        function (data) {
            search_output.empty().html(data);
        }
    )
}
function changePresient() {
    var data = $("input[name='responsable']:checked").val().split(',');
    var username = data[0];
    var club = data[1];

    $.post('../functions/change_pres_func.php', { username: username, club: club },
        function (data) {
            $('#current_president').html(data);
            if (!alert("President Changed successfully")) {
                window.location.reload();
            }
        }
    )
}

$(document).ready(() => {
    $(".blog-slider__content a").click(function () {
        var id_event = $(this).attr("data-event-id");
        $.post('../functions/get_event_data.php', {
            id: id_event
        }, function (data) {
            data = JSON.parse(data);
            $("#eventsModal h4").text(data.title);
            $('#eventsModal img').attr("src", data.cover);
            $('#eventsModal source').attr("src", data.video);
            $('#eventsModal p').text(data.description);
            try {
                $('#modifyEvent input[name="title"]').attr("value",data.title);
                $('#modifyEvent textarea').text(data.description);
                $('#modifyEvent input[name="date"]').attr("value",data.date_fin);
                $('#up-btn').attr("data-event-id",id_event);
            }catch (err){}
        })
    });
    $("#up-btn").click(()=>{
        var form=$("#mod_event_form");
        form.submit();
    })
})

function new_cellule(){
    var form=$("#cel_form");
    form.submit();
}

function new_event(){
    var form=$("#event_form");
    form.submit(function(e){
        e.preventDefault();
        var data_form=new FormData(this);
        
        var url="../functions/create_event.php";
        $.ajax({
            url: url,
            type: 'POST',
            data: data_form,
            success: function (data) {
                alert(data);
                if (!alert('cellule created successfully')){
                    window.location.reload();
                }
            },
            contentType: false,
            processData: false
        });
    })
}